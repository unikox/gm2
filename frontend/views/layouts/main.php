<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

use yii\bootstrap\Carousel;
use frontend\widgets\siteComponents\pubMenu;
use app\models\Menuitems;

AppAsset::register($this);
$this->registerCssFile("@web/css/gm2style.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
//Без слайдера разблокирвать:
//$this->registerJsFile(Yii::$app->request->baseUrl.'/js/menu.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$mItems=Menuitems::find()->all();
$mit = new Menuitems;
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

<div class="gm2container">
    <div class="HatBox">
        <div class="HatBoxItemData">
            <div class="HatLogo">Логотип</div>
            <div class="HatData"><h3>Муниципальное автономное образовательное учреждение гимназия № 2 г. Иркутска</h3></div>
        </div>
        <div class="HatBoxItem">
            <div class="HatSlider">
                <?php
                    echo Carousel::widget([
                        'items' => [
                            
                            '<img src="/images/slider3.jpg"/>',
                            
                            ['content' => '<img src="/images/slider2.jpg"/>'],
                            
                            ['content' => '<img src="/images/slider3.jpg"/>'],
                            ['content' => '<img src="/images/slider1.jpg"/>'],
                        ]
                    ]);
                ?>
            </div>
        </div>
    </div>
    <div class="ContentBox">
        <div class="ContentItemBox">
            <div class="ContentItemBaner">Банер</div>
            <div class="ContentItemMenu">
                <?php

                    echo pubMenu::widget([
                        'sections' =>$mit->getSections(),
                        'subsections' =>$mit->getSubSections(),
                    ]);
                  ?>

            </div>
        </div>
            
        <div class="ContentItem"><?= $content ?>
            
        </div>
    </div>

</div>
    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= date('Y') ?> <?= Html::encode(Yii::$app->name) ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
