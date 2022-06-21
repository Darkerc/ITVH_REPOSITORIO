<?php

namespace app\controllers;

use app\models\Bitacora;
use app\models\BitacoraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BitacoraController implements the CRUD actions for Bitacora model.
 */
class BitacoraController extends Controller
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
     * Lists all Bitacora models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BitacoraSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bitacora model.
     * @param int $bit_id Bit ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($bit_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($bit_id),
        ]);
    }

    /**
     * Creates a new Bitacora model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bitacora();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'bit_id' => $model->bit_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Bitacora model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $bit_id Bit ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($bit_id)
    {
        $model = $this->findModel($bit_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'bit_id' => $model->bit_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bitacora model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $bit_id Bit ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($bit_id)
    {
        $this->findModel($bit_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Bitacora model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $bit_id Bit ID
     * @return Bitacora the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($bit_id)
    {
        if (($model = Bitacora::findOne(['bit_id' => $bit_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
