<?php

namespace app\controllers;

use app\models\Palabra;
use app\models\PalabraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PalabraController implements the CRUD actions for Palabra model.
 */
class PalabraController extends Controller
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
     * Lists all Palabra models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PalabraSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Palabra model.
     * @param int $pal_id Pal ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pal_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pal_id),
        ]);
    }

    /**
     * Creates a new Palabra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Palabra();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pal_id' => $model->pal_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Palabra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pal_id Pal ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pal_id)
    {
        $model = $this->findModel($pal_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pal_id' => $model->pal_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Palabra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pal_id Pal ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pal_id)
    {
        $this->findModel($pal_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Palabra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pal_id Pal ID
     * @return Palabra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pal_id)
    {
        if (($model = Palabra::findOne(['pal_id' => $pal_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionBusqueda()
    {
        $searchModel = new PalabraSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('busqueda', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
