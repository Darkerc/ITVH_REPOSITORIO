<?php

namespace app\controllers;

use app\models\Encargado;
use app\models\EncargadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EncargadoController implements the CRUD actions for Encargado model.
 */
class EncargadoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
    }

    /**
     * Lists all Encargado models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EncargadoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Encargado model.
     * @param int $enc_id Enc ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($enc_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($enc_id),
        ]);
    }

    /**
     * Creates a new Encargado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Encargado();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'enc_id' => $model->enc_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Encargado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $enc_id Enc ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($enc_id)
    {
        $model = $this->findModel($enc_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'enc_id' => $model->enc_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Encargado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $enc_id Enc ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($enc_id)
    {
        $this->findModel($enc_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Encargado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $enc_id Enc ID
     * @return Encargado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($enc_id)
    {
        if (($model = Encargado::findOne(['enc_id' => $enc_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
