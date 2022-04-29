<?php

namespace app\controllers;

use app\models\AutorTipo;
use app\models\AutorTipoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AutorTipoController implements the CRUD actions for AutorTipo model.
 */
class AutorTipoController extends Controller
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
     * Lists all AutorTipo models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AutorTipoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AutorTipo model.
     * @param int $autt_id Autt ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($autt_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($autt_id),
        ]);
    }

    /**
     * Creates a new AutorTipo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AutorTipo();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'autt_id' => $model->autt_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AutorTipo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $autt_id Autt ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($autt_id)
    {
        $model = $this->findModel($autt_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'autt_id' => $model->autt_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AutorTipo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $autt_id Autt ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($autt_id)
    {
        $this->findModel($autt_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AutorTipo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $autt_id Autt ID
     * @return AutorTipo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($autt_id)
    {
        if (($model = AutorTipo::findOne(['autt_id' => $autt_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
