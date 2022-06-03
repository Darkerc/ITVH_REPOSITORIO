<?php

namespace app\controllers;

use app\models\Recurso;
use app\models\RecursoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecursoController implements the CRUD actions for Recurso model.
 */
class RecursoController extends Controller
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
     * Lists all Recurso models.
     *
     * @return string
     */
    public function actionIndex()
    {
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
        return $this->render('view', [
            'model' => $this->findModel($rec_id),
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
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'rec_id' => $model->rec_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'rec_id' => $model->rec_id]);
        }

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

        return $this->redirect(['index']);
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

    public function actionPublicacion()
    {
        $searchModel = new RecursoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('publicacion', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAutor()
    {
        $searchModel = new RecursoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('autor', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTitulo()
    {
        $searchModel = new RecursoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('titulo', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
