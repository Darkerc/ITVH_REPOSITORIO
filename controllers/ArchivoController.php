<?php

namespace app\controllers;

use app\models\Archivo;
use app\models\ArchivoSearch;
use app\models\Recurso;
use app\models\RecursoArchivo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\HttpException;
use yii\web\UploadedFile;

/**
 * ArchivoController implements the CRUD actions for Archivo model.
 */
class ArchivoController extends Controller
{
    /**
     * @inheritDoc
     */
    public $freeAccessActions = ['index', 'view', 'file-view', 'file-download'];

    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Archivo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ArchivoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Archivo model.
     * @param int $arc_id Arc ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($arc_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($arc_id),
        ]);
    }

    /**
     * Displays a single Archivo model.
     * @param int $arc_id Arc ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionFileView($arc_id)
    {
        $model = $this->findModel($arc_id);
        $model->arc_visitas = $model->arc_visitas + 1;
        $model->save(false, ['arc_visitas']);

        return $this->render('FileView', [
            'model' => $model,
        ]);
    }

    public function actionFileUpload($rec_id)
    {
        $model = Recurso::findOne(['rec_id' => $rec_id]);
        $model->archivos = $_FILES;
        $model->archivos = UploadedFile::getInstances($model, 'archivos');
        $model->upload(false);

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => true]);
        exit();
    }

    public function actionFileDownload($arc_id)
    {
        $model = $this->findModel($arc_id);
        $model->arc_descargas = $model->arc_descargas + 1;
        $model->save(false, ['arc_descargas']);
        $model->actionDownload();
    }

    /**
     * Creates a new Archivo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Archivo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'arc_id' => $model->arc_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Archivo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $arc_id Arc ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($arc_id)
    {
        $model = $this->findModel($arc_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'arc_id' => $model->arc_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Archivo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $arc_id Arc ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($arc_id)
    {
        $this->findModel($arc_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Archivo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $arc_id Arc ID
     * @return Archivo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($arc_id)
    {
        if (($model = Archivo::findOne(['arc_id' => $arc_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionRecursoArchivoDelete($rec_id, $arc_id)
    {
        $archivo = Archivo::findOne(['arc_id' => $arc_id]);
        $recursoArchivo = RecursoArchivo::findOne(['recarc_fkarchivo' => $arc_id, 'recarc_fkrecurso' => $rec_id]);

        if (is_null($archivo) || is_null($recursoArchivo)) throw new HttpException(404, 'Recursos no encontrados');
        if (!$archivo->deleteFile()) throw new HttpException(500, 'No se pudo eliminar el archivo');

        $recursoArchivo->delete();
        $archivo->delete();

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['success' => true]);
        exit();
    }
}
