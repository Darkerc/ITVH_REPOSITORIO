<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Palabra;
use app\models\Recurso;
use app\models\RecursoSearch;
use app\models\Visitas;

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
        $language = isset($_SESSION['language']) ? $_SESSION['language'] : 'es-MX';
        Yii::$app->language = $language;

        Visitas::addVisit();

        $recursos = array_map(function (Recurso $recurso) {
            return [
                'content' => '<img src="images/blanco.jpg"/>',
                'caption' => '<h4 class="textblacktitle">' . $recurso->rec_nombre . '</h4> 
                                <p class="textblack">' . $recurso->rec_resumen . '</p>
                                <a  href="/recurso/view?rec_id=' . $recurso->rec_id . '">
                                <button type="button" class="btn btn-info btn-sm d-inline mx-auto my-2"> '. Yii::t('app', 'ver_repositorio') .' </button>
                                </a>'
            ];
        }, Recurso::find()->orderby('RAND()')->limit(6)->all());

        $palabras = array_map(function (Palabra $palabra) {
            return [
                'href'  => 'site/busqueda',
                'label' => $palabra->pal_nombre,
            ];
        }, Palabra::getPalabrasCounted());

        return $this->render('index', compact('recursos'));
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

    public function actionBusqueda()
    {        
        $searchModel = new RecursoSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('busqueda', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLanguage()
    {
        if ($_SESSION['language'] == 'en-US') {
            $_SESSION['language'] = 'es-MX';
        } else {
            $_SESSION['language'] = 'en-US';
        }

        header('location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
