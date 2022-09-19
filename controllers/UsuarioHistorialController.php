<?php

namespace app\controllers;

use app\models\UsuarioHistorial;
use app\models\UsuarioHistorialSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioHistorialController implements the CRUD actions for UsuarioHistorial model.
 */
class UsuarioHistorialController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all UsuarioHistorial models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioHistorialSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsuarioHistorial model.
     * @param int $usuhis_id Usuhis ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($usuhis_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($usuhis_id),
        ]);
    }

    /**
     * Creates a new UsuarioHistorial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new UsuarioHistorial();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'usuhis_id' => $model->usuhis_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing UsuarioHistorial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $usuhis_id Usuhis ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($usuhis_id)
    {
        $model = $this->findModel($usuhis_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'usuhis_id' => $model->usuhis_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing UsuarioHistorial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $usuhis_id Usuhis ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($usuhis_id)
    {
        $this->findModel($usuhis_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsuarioHistorial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $usuhis_id Usuhis ID
     * @return UsuarioHistorial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($usuhis_id)
    {
        if (($model = UsuarioHistorial::findOne(['usuhis_id' => $usuhis_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
