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
use frontend\widgets\siteComponents\pubHeader;
use frontend\widgets\siteComponents\pubFooter;
use app\models\Menuitems;
use app\models\Template;
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
    <meta name="yandex-verification" content="1c1ee3cd615054d9" />
    <meta name='wmail-verification' content='878c92b24b21e0d2566ca87132de1d91' />
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
            <?php
            $hdr= new Template();
            echo pubHeader::widget([
                'header_data' => $hdr->getHeader(),
            ]);
            ?>
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


            <?php

            $ftr = new Template();
            echo pubFooter::widget([
                'footer_data' => $ftr->getFooter()
            ]);

            ?>

        <div class="footer_date">
            <?php echo date('d.m.Y');?>
        </div>


    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
