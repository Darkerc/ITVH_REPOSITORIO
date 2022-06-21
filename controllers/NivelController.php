<?php

namespace app\controllers;

use app\models\Nivel;
use app\models\NivelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NivelController implements the CRUD actions for Nivel model.
 */
class NivelController extends Controller
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
     * Lists all Nivel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new NivelSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Nivel model.
     * @param int $niv_id Niv ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($niv_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($niv_id),
        ]);
    }

    /**
     * Creates a new Nivel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Nivel();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'niv_id' => $model->niv_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Nivel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $niv_id Niv ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($niv_id)
    {
        $model = $this->findModel($niv_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'niv_id' => $model->niv_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Nivel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $niv_id Niv ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($niv_id)
    {
        $this->findModel($niv_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Nivel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $niv_id Niv ID
     * @return Nivel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($niv_id)
    {
        if (($model = Nivel::findOne(['niv_id' => $niv_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
