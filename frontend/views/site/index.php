<?php

use app\models\News;
use app\models\Hpage;
use frontend\widgets\siteComponents\pubHomepage;
use frontend\widgets\siteComponents\pubNews;

/* @var $this yii\web\View */
$hpage = new Hpage();
$this->title = 'Гимназия №2';
?>
<div class="site-index">
    <?php
    //var_dump($mit->getSections());
    echo pubHomepage::widget([
        'HpageBody' =>$hpage->getBody(),
 //       'subsections' =>$mit->getSubSections(),
    ]);
    ?>
    <?php
    //var_dump($mit->getSections());
    //echo pubNews::widget([
   //     'sections' =>$mit->getSections(),
    //    'subsections' =>$mit->getSubSections(),
   // ]);
    ?>
</div>
