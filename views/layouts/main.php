<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use webvimark\modules\UserManagement\UserManagementModule;
use webvimark\modules\UserManagement\models\User;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => 'ITVH Repositorio',
            //'brandUrl' => Yii::$app->homeUrl,
            'brandLabel' => '
                <div class="logo_container">
                    <img src="/images/logo_itvh_largo.png" class="logo_navbar"/>
                </div>
            ',
            'options' => [
                'class' => 'navbar_index navbar-expand-md navbar-light fixed-top',
            ],
        ]);
        echo Nav::widget([
            'encodeLabels' => false,
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Inicio', 'url' => Yii::$app->homeUrl],
                ['label' => 'Búsqueda', 'url' => '/site/busqueda'],
                ['label' => 'Recursos', 'url' => '/recurso/index'],
                ['label' => 'Mis Recursos', 'url' => '/recurso/mis-recursos', 'visible' => User::hasRole(['aut'], false)],
				Yii::$app->user->isSuperadmin ? ( [
                    'label' => 'Frontend routes',
                    'items' => [
                        ['label' => 'Login', 'url'               => ['/user-management/auth/login']],
                        ['label' => 'Logout', 'url'              => ['/user-management/auth/logout']],
                        ['label' => 'Registration', 'url'        => ['/user-management/auth/registration']],
                        ['label' => 'Change own password', 'url' => ['/user-management/auth/change-own-password']],
                        ['label' => 'Password recovery', 'url'   => ['/user-management/auth/password-recovery']],
                        ['label' => 'E-mail confirmation', 'url' => ['/user-management/auth/confirm-email']],
                    ],
                ]): '',
                Yii::$app->user->isSuperadmin ? ([
                    'label' => 'Backend routes',
                    'items' => UserManagementModule::menuItems()
                ]): '',
                Yii::$app->user->isGuest ? (
                    //['label' => 'Login', 'url' => ['/site/login']]
                    ['label' => 'Iniciar sesión', 'url' => ['/user-management/auth/login']]
                ) : ('<li>'
                    . Html::beginForm(['/user-management/auth/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Cerrar sesión (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        NavBar::end();
        ?>
    </header>

    <main onload="PR.prettyPrint()" role="main" class="flex-shrink-0">
        <div class="container" style="margin-top: 70px;">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="logo_container col-md-4 footer-column">
                    <img src="/images/logo_blanco.png" class="logo_itvh_light" />
                </div>
                <div class="col-md-4 footer-column">
                </div>
                <div class="col-md-4 footer-column">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <span class="footer-title">Contacto</span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link"><i class="fas fa-phone"></i>+47 45 80 80 80</span>
                        </li>
                        <li class="nav-item d-flex justify-content-center pb-1">
                            <a href="#">
                                <i class="material-icons" style="color: #fff !important;">facebook</i>
                            </a>
                            <span style="color: white;" class="ml-1">
                                facebook
                            </span>
                        </li>
                        <li class="nav-item d-flex justify-content-center pb-1">
                            <a href="#">
                                <i class="material-icons" style="color: #fff !important;">facebook</i>
                            </a>
                            <span style="color: white;" class="ml-1">
                                facebook
                            </span>
                        </li>
                        <li class="nav-item d-flex justify-content-center pb-1">
                            <a href="#">
                                <i class="material-icons" style="color: #fff !important;">facebook</i>
                            </a>
                            <span style="color: white;" class="ml-1">
                                facebook
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center"><i class="fas fa-ellipsis-h"></i></div>
            <div class="divider my-3 mx-auto"></div>

            <div class="row text-center">
                <div class="col-md-4 box">
                </div>
                <div class="col-md-4 box">
                    <span class="copyright quick-links">ITVH &copy; REPOSITORIO <script>
                            document.write(new Date().getFullYear())
                        </script>
                    </span>
                </div>
                <div class="col-md-4 box">
                </div>
            </div>
        </div>
    </footer>

    <?= Html::dropDownList('idioma', 's_id', [], [ 'class' => ['toggle_language'] ]) ?>
    <!-- <footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer> -->

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>

<style>
    .toggle_language {
        position: fixed;
        bottom: 30px;
        left: 30px;
        width: 200px;
    }
</style>