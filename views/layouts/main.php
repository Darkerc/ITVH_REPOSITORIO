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
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header>
        <?php
        NavBar::begin([
            'brandLabel' => 'ITVH Repositorio',
            //'brandUrl' => Yii::$app->homeUrl,
            'brandLabel' => '<img src="/images/logo_itvh_largo.png" class="logo_navbar"/>',
            'options' => [
                'class' => 'mynavbar navbar-expand-md navbar-light fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'items' => [
                ['label' => 'Inicio', 'url' => Yii::$app->homeUrl],
                /*['label' => 'Inicio', 'url' => ['/autor/index']],*/
                [
                    'label' => 'Listar',
                    'items' => [
                        ['label' => 'Año de publicación', 'url' => ['/recurso']],
                        ['label' => 'Autor', 'url'              => ['/autor']],
                        ['label' => 'Titulo', 'url'             => ['/archivo']],
                        ['label' => 'Palabras clave', 'url'     => ['/palabra']],
                    ],
                ],
                ['label' => 'Ayuda', 'url' => ['/site/about']],
                [
                    'label' => 'Frontend routes',
                    'items' => [
                        ['label' => 'Login', 'url'               => ['/user-management/auth/login']],
                        ['label' => 'Logout', 'url'              => ['/user-management/auth/logout']],
                        ['label' => 'Registration', 'url'        => ['/user-management/auth/registration']],
                        ['label' => 'Change own password', 'url' => ['/user-management/auth/change-own-password']],
                        ['label' => 'Password recovery', 'url'   => ['/user-management/auth/password-recovery']],
                        ['label' => 'E-mail confirmation', 'url' => ['/user-management/auth/confirm-email']],
                    ],
                ],
                [
                    'label' => 'Backend routes',
                    'items' => UserManagementModule::menuItems()
                ],
                Yii::$app->user->isGuest ? (
                    //['label' => 'Login', 'url' => ['/site/login']]
                    ['label' => 'Login', 'url' => ['/user-management/auth/login']]
                ) : ('<li>'
                    . Html::beginForm(['/user-management/auth/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
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

    <main role="main" class="flex-shrink-0">
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
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <span class="footer-title">Company</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Job postings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">News and articles</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 footer-column">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <span class="footer-title">Contact & Support</span>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link"><i class="fas fa-phone"></i>+47 45 80 80 80</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-comments"></i>Live chat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-envelope"></i>Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-star"></i>Give feedback</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center"><i class="fas fa-ellipsis-h"></i></div>

            <div class="row text-center">
                <div class="col-md-4 box">
                    <span class="copyright quick-links">Copyright &copy; Your Website <script>
                            document.write(new Date().getFullYear())
                        </script>
                    </span>
                </div>
                <div class="col-md-4 box">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="material-icons" style="color: #fff !important;">twitter</i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="material-icons" style="color: #fff !important;">instagram</i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="material-icons" style="color: #fff !important;">facebook</i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 box">
                    <ul class="list-inline quick-links">
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

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