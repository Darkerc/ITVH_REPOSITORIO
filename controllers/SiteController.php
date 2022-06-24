<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;
use app\models\Carrera;
use app\models\ContactForm;
use app\models\Nivel;
use app\models\Palabra;
use app\models\Recurso;
use app\models\RecursoSearch;
use app\models\RecursoTipo;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public $freeAccess = true;

    public function behaviors()
    {
        return [
            'ghost-access' => [
                'class' => 'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
        ];
        /*return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];*/
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $recursos = array_map(function ($recurso) {
            return [
                'content' => '<img src="images/blanco.jpg"/>',
                'caption' => '<h4 class="textblacktitle">' . $recurso->rec_nombre . '</h4> 
                                <p class="textblack">' . $recurso->rec_resumen . '</p>
                                <a  href="/recurso/view?rec_id=' . $recurso->rec_id . '">
                                <button type="button" class="btn btn-info btn-sm d-inline mx-auto my-2"> Ver repositorio </button>
                                </a>'
            ];
        }, Recurso::find()->orderby('RAND()')->limit(6)->all() );

        $carreras = array_map(function ($carrera) {
            return [
                'href'  => 'site/busqueda',
                'label' => $carrera->car_nombre,
                'chip'  => rand(1, 1000)
            ];
        }, Carrera::find()->orderby('RAND()')->limit(6)->all());

        $palabras = array_map(function ($palabra) {
            return [
                'href'  => 'site/busqueda',
                'label' => $palabra->pal_nombre,
            ];
        }, Palabra::find()->orderby('RAND()')->limit(4)->all());

        return $this->render('index', compact('recursos', 'carreras', 'palabras'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionSearch()
    {
        return $this->render('search');
    }

    public function actionRecurso()
    {
        return $this->render('recurso');
    }

    public function actionBusqueda()
    {
        $searchModel = new RecursoSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('busqueda', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
