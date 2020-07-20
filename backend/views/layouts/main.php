<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;
AppAsset::register($this);
$this->registerCssFile("@web/css/gm2style.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        //'brandUrl' => Yii::$app->homeUrl,
        'brandUrl' => 'http://gm2irk.ru/index.php?r=request',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        //['label' => 'Home', 'url' => ['/site/index']],
        
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
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
                [ 'label' => 'Менеджер разделов меню', 'url' => Url::to('index.php?r=menuitems')] ,
                [ 'label' => 'Менеджер страниц', 'url' => Url::to('index.php?r=pages')],
                [ 'label' => 'Менеджер слайдеров', 'url' => Url::to('index.php?r=slider')],
                [ 'label' => 'Менеджер новостей', 'url' => Url::to('index.php?r=news')]
            ]];

            
            //$menuItems[] = ['label' => 'Разделы горизонтального меню', 'url' => ['/menu']];
            //$menuItems[] = ['label' => 'Разделы вертикального меню', 'url' => ['/menu']];
            //$menuItems[] = ['label' => 'Материалы', 'url' => ['/posts']];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
