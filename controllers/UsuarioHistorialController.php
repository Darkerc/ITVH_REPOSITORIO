<?php

namespace app\controllers;

use app\models\UsuarioHistorialSearch;
use Yii;
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
        $dataProvider->query->andWhere(['usuhis_fkuser'=> Yii::$app->user->id]);
        $dataProvider->sort->defaultOrder = ['usuhis_fecha' => SORT_DESC];

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
}
