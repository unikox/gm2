<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;


use frontend\widgets\siteComponents\pubMenu;
use frontend\widgets\siteComponents\pubSlider;
use app\models\Menuitems;
use app\models\Slider;

AppAsset::register($this);
$this->registerCssFile("@web/css/gm2style.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);
//Без слайдера разблокирвать:
//$this->registerJsFile(Yii::$app->request->baseUrl.'/js/menu.js',['depends' => [\yii\web\JqueryAsset::className()]]);

$this->registerJsFile(Yii::$app->request->baseUrl.'https://maps.api.2gis.ru/2.0/loader.js?pkg=full',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/2gis.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/lists.js',['depends' => [\yii\web\JqueryAsset::className()]]);
$mItems = Menuitems::find()->all();
$mit = new Menuitems;
$slider = new Slider();
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
            <div class="HatLogo"><img class="HatLogImage" src="/images/unesko_img.png"/></div>
            <div class="HatData"><h3 class="HatDataItem">Муниципальное автономное общеобразовательное</h3><h3 class="HatDataItem"> учреждение города Иркутска гимназия № 2 </h3></div>
        </div>
        <div class="HatBoxItem">
            <div class="HatSlider">
                <?php
                    echo pubSlider::widget([
                        'slider_items' =>$slider -> getSliderItems('General'),

                    ]);
                ?>
            </div>
        </div>
    </div>
    <div class="ContentBox">
        <div class="ContentItemBox">
            <div class="ContentItemBaner"><a href="http://gm2irk.ru/index.php?r=request" ><img class="HatBaner" src="http://gm2irk.ru/images/vopros.png"></a></div>
            <div class="ContentItemMenu">
                <?php
                    //var_dump($mit->getSections());
                    echo pubMenu::widget([
                        'sections' => $mit->getSections(),
                        'subsections' => $mit->getSubSections(),
                        'sectionsAlone' => $mit->getSubSectionsAlone(),
                    ]);

                  ?>

            </div>
        </div>
            
        <div class="ContentItem"><?= $content ?>
            
        </div>
    </div>

</div>
    <footer class="footer">

        <p class="container">
            <div class="footerdatabox">
                <p class="pull-left">
                    <?= date('d.m.Y') ?>
                </p>
                <p class="pull-left">&copy; <?= Html::encode('МАОУ города Иркутска гимназия № 2') ?></p>
                <p class="pull-left">
                    <?= Html::encode('Телефон-факс: (3952)36-90-60') ?>
                </p>
                <p class="pull-left">
                    <?= Html::encode('E-mail: gimnasium2@inbox.com') ?>
                </p>
            </div>
        </p>

        <div class="gym_map">
            <div id="map" style="width:710px; height:300px"></div>
        </div>


    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
