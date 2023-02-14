<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);
//$this->registerCssFile("@web/css/site.css", ['depends' => [\yii\bootstrap\BootstrapAsset::class]]);
$this->registerCssFile("@web/css/gm2style.css", ['depends' => [\yii\bootstrap\BootstrapAsset::class]]);
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
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => 'http://gm2-irk.ru/index.php?r=request',
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
            //'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [];

    if (Yii::$app->user->isGuest) {
        // echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {

        $menuItems[] = '<li>' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton( 'Выход (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
        

            $menuItems[] = ['label' => 'Обратная связь', 'items' =>  [


                [ 'label' => 'Ответы администрации', 'url' => Url::to('index.php?r=answer')] ,
                [ 'label' => 'Сообщения посетителей', 'url' => Url::to('index.php?r=request')] 
            ]];
            $menuItems[] = ['label' => 'Содержимое сайта', 'items' =>  [
                [ 'label' => 'Настройка главной страницы', 'url' => Url::to('index.php?r=hpage%2Fupdate&id=1')] ,
                [ 'label' => 'Настройка шаблона сайта', 'url' => Url::to('index.php?r=template%2Fupdate&id=1')] ,
                [ 'label' => 'Менеджер разделов меню', 'url' => Url::to('index.php?r=menuitems')] ,
                [ 'label' => 'Менеджер страниц', 'url' => Url::to('index.php?r=pages')],
                [ 'label' => 'Менеджер слайдеров', 'url' => Url::to('index.php?r=slider')],
                [ 'label' => 'Менеджер новостей', 'url' => Url::to('index.php?r=news')]
            ]];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
