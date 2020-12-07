<?php

use app\models\News;
use app\models\Hpage;
use frontend\widgets\siteComponents\pubHomepage;
use frontend\widgets\siteComponents\pubNews;
use yii\widgets\ListView;

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
    <div class="news_pager_box">
        <div class="news_pager_headers_list">
            <a class='news_pager_headers_item' href="/index.php?r=news" title='Нажмите для перехода в новости'>Новости</a>
            <a class='news_pager_headers_item' href="/index.php?r=NewsSearch[shortbody]=covid&r=news" title='Нажмите для перехода в новости по COVID-19'>ДОСТОВЕРНО о COVID</a>

        </div>
        <div class="news_item_box">
            <?= ListView::widget([
                'dataProvider' => $dataNewsProvider,
                'itemView' => '_news__item',
                'summary' => false,
                'viewParams' => [
                    'fullView' => true,
                    'context' => 'main-page',

                ],
            ]);?>
        </div>

    </div>

</div>
