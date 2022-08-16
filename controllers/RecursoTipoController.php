<?php

namespace app\controllers;

use app\models\RecursoTipo;
use app\models\RecursoTipoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * RecursoTipoController implements the CRUD actions for RecursoTipo model.
 */
class RecursoTipoController extends Controller
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

    public function actionGetOne($rectip_id)
    {
        $rec_tipo = RecursoTipo::find()->where((['rectip_id' => $rectip_id]))->one();

        header('Content-Type: application/json; charset=utf-8');
        echo Json::encode($rec_tipo);
        exit();
    }

    /**
     * Lists all RecursoTipo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RecursoTipoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RecursoTipo model.
     * @param int $rectip_id Rectip ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($rectip_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($rectip_id),
        ]);
    }

    /**
     * Creates a new RecursoTipo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RecursoTipo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'rectip_id' => $model->rectip_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RecursoTipo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $rectip_id Rectip ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($rectip_id)
    {
        $model = $this->findModel($rectip_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rectip_id' => $model->rectip_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RecursoTipo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $rectip_id Rectip ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($rectip_id)
    {
        $this->findModel($rectip_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RecursoTipo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $rectip_id Rectip ID
     * @return RecursoTipo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($rectip_id)
    {
        if (($model = RecursoTipo::findOne(['rectip_id' => $rectip_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
