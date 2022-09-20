<?php

namespace app\controllers;

use app\models\Autor;
use Yii;
use app\models\AutorRecurso;
use app\models\Bitacora;
use app\models\Palabra;
use app\models\Recurso;
use app\models\RecursoCarrera;
use app\models\RecursoSearch;
use app\models\RecursoTipo;
use app\models\UsuarioHistorial;
use DateTime;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use webvimark\modules\UserManagement\models\User;
use yii\web\UploadedFile;

/**
 * RecursoController implements the CRUD actions for Recurso model.
 */
class RecursoController extends Controller
{
    /**
     * @inheritDoc
     */
    public $freeAccessActions = ['index', 'view', 'download-dublin-file'];

    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Recurso models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $language = isset($_SESSION['language']) ? $_SESSION['language'] : 'es-MX';
        Yii::$app->language = $language;

        $searchModel = new RecursoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recurso model.
     * @param int $rec_id Rec ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($rec_id)
    {
        $language = isset($_SESSION['language']) ? $_SESSION['language'] : 'es-MX';
        Yii::$app->language = $language;
        //UsuarioHistorial::visitRecurso(Yii::$app->user->id, $rec_id);

        $model = $this->findModel($rec_id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Recurso model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Recurso();

        if ($this->request->isPost) {
            $loaded = $model->load($this->request->post());
            if (User::hasRole(['aut', false])) {
                $date = new DateTime();
                $model->rec_registro = $date->format('Y-m-d H:i:s');
            }
            $model->rec_descripcion = json_encode([date('Y-m-d H:i:s') => 'Se creo el recurso']);
            $model->archivos = UploadedFile::getInstances($model, 'archivos');
            $saved = $model->save();
            if ($loaded && $saved) {
                foreach ($model->recursoCarrera as $carrera) {
                    $carreras = new RecursoCarrera();
                    $carreras->reccar_fkrecurso = $model->rec_id;
                    $carreras->reccar_fkcarrera = $carrera;
                    $carreras->save();
                };
                if (User::hasRole(['aut', false])) {
                    $autor = new AutorRecurso();
                    $autor->autrec_fkrecurso = $model->rec_id;
                    $autor->autrec_fkautor = Autor::autorId();
                    $autor->save();
                } else if (User::hasRole(['admon', false])) {
                    foreach ($model->autores as $autors) {
                        $autor = new AutorRecurso();
                        $autor->autrec_fkrecurso = $model->rec_id;
                        $autor->autrec_fkautor = $autors;
                        $autor->save();
                    }
                };
                foreach ($model->palabrasc as $palabra) {
                    $palabras = new Palabra();
                    $palabras->pal_fkrecurso = $model->rec_id;
                    $palabras->pal_nombre = strtoupper($palabra);

                    $palabras->save();
                }

                $model->upload();
                return $this->redirect(['view', 'rec_id' => $model->rec_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        //echo         var_dump($model->getErrors());
        // die;
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDeleteRecursoField($rec_id)
    {
        $model = $this->findModel($rec_id);
        $propertyName = array_keys($this->request->post())[0];
        $propertyValue = array_values($this->request->post())[0];
        $data = null;

        $model->rec_descripcion = json_encode([date('Y-m-d H:i:s') => 'Se actualizó el recurso']);
        $model->save(false, ['rec_descripcion']);

        switch ($propertyName) {
            case 'recursoCarrera': {
                    $rCarrera = RecursoCarrera::findOne([
                        'reccar_fkcarrera' => $propertyValue,
                        'reccar_fkrecurso' => $rec_id
                    ]);
                    $rCarrera->delete();
                    $data = $rCarrera->reccar_id;
                    break;
                }
            case 'palabrasc': {
                    $palabra = Palabra::findOne([
                        'pal_id' => $propertyValue
                    ]);
                    $palabra->delete();
                    $data = $palabra->pal_id;
                    break;
                }
            case 'autores': {
                    $autorRecurso = AutorRecurso::findOne([
                        'autrec_fkrecurso' => $rec_id,
                        'autrec_fkautor' => $propertyValue
                    ]);
                    $autorRecurso->delete();
                    $data = $autorRecurso->autrec_id;
                    break;
                }
            default: {
                    $model->updateAttributes([$propertyName => $propertyValue]);
                    $data = $model;
                    break;
                }
        }

        Bitacora::addEvent($rec_id, $propertyName, $propertyValue, Bitacora::$ACTION_DELETE);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        exit();
    }

    public function actionUpdateRecursoField($rec_id)
    {
        $model = $this->findModel($rec_id);
        $propertyName = array_keys($this->request->post())[0];
        $propertyValue = array_values($this->request->post())[0];
        $data = null;

        $model->rec_descripcion = json_encode([date('Y-m-d H:i:s') => 'Se actualizo el recurso']);
        $model->save(false, ['rec_descripcion']);

        switch ($propertyName) {
            case 'recursoCarrera': {
                    $rectip_id = $propertyValue['rectip_id'];
                    $car_id = $propertyValue['car_id'];

                    $isMultiple = RecursoTipo::findOne(['rectip_id' => $rectip_id])->rectip_multiple;
                    $data = $isMultiple;
                    if (!$isMultiple) {
                        $recursosCarreras = RecursoCarrera::findAll(['reccar_fkrecurso' => $rec_id]);
                        foreach ($recursosCarreras as $recursoCarrera) {
                            $recursoCarrera->delete();
                        }
                    }

                    $rCarrera = new RecursoCarrera();
                    $rCarrera->reccar_fkrecurso = $model->rec_id;
                    $rCarrera->reccar_fkcarrera = $car_id;
                    $rCarrera->save();
                    $data = $rCarrera->reccar_id;
                    break;
                }
            case 'palabrasc': {
                    $palabras = new Palabra();
                    $palabras->pal_fkrecurso = $model->rec_id;
                    $palabras->pal_nombre = strtoupper($propertyValue);
                    $palabras->save();
                    $data = $palabras->pal_id;
                    break;
                }
            case 'autores': {
                    $autor = new AutorRecurso();
                    $autor->autrec_fkrecurso = $model->rec_id;
                    $autor->autrec_fkautor = $propertyValue;
                    $autor->save();
                    $data = $propertyValue;
                    break;
                }
            default: {
                    $model->updateAttributes([$propertyName => $propertyValue]);
                    $data = $model->rec_id;
                    break;
                }
        }

        Bitacora::addEvent($rec_id, $propertyName, $propertyValue, Bitacora::$ACTION_UPDATE);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        exit();
    }

    public function actionDownloadDublinFile($type, $rec_id)
    {
        if (($model = Recurso::findOne(['rec_id' => $rec_id])) !== null) {
            switch ($type) {
                case 'json': {
                        header("Content-disposition: attachment; filename={$model->joinName}.json");
                        header('Content-type: application/json');
                        echo $model->getDublinCoreJSON();
                    break;
                }
                case 'xml': {
                        header("Content-disposition: attachment; filename={$model->joinName}.xml");
                        header('Content-Type: application/xml; charset=utf-8');
                        echo $model->getDublinCoreXML();
                    break;
                }
                case 'csv': {
                        header("Content-disposition: attachment; filename={$model->joinName}.csv");
                        header('Content-Type: text/csv; charset=utf-8');
                        echo $model->getDublinCoreCSV();
                    break;
                }
            }
            exit();
        }
    }

    /**
     * Updates an existing Recurso model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $rec_id Rec ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($rec_id)
    {
        $model = $this->findModel($rec_id);
        if (!Autor::isAllowedToEdit(Yii::$app->user->identity->id, $model->rec_id)) $this->redirect('view?rec_id=' . $model->rec_id);

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Recurso model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $rec_id Rec ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($rec_id)
    {
        $this->findModel($rec_id)->delete();

        return json_encode(['ok' => true]);
    }

    /**
     * Finds the Recurso model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $rec_id Rec ID
     * @return Recurso the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rec_id)
    {
        if (($model = Recurso::findOne(['rec_id' => $rec_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionMisRecursos()
    {
        $searchModel = new RecursoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, true);

        return $this->render('mrecursos', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
