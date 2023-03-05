<?php

use app\models\Hpage;
use frontend\widgets\siteComponents\pubHomepage;
use frontend\widgets\siteComponents\pubNews;
use yii\widgets\ListView;
use yii\helpers\Url;

\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => 'Гимназия №2, Иркутск']);
\Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => 'сайт, на сайте, Официальный, Страницы, педагогов, педагоги, дорожная карта, образование,
коррекционное, расписание уроков, как добраться, ребенок, детей, школьный, портал, воспитанники, школьники,
школьницы']);
\Yii::$app->view->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Url::to(['/favicon.png'])]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/news.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]);
/* @var $this yii\web\View */
$hpage = new Hpage();
$this->title = 'Гимназия №2, Университетский микрорайон, 85, Иркутск';
?>
<div class="site-index">
    <?php
    //var_dump($mit->getSections());
    echo pubHomepage::widget([
        'HpageBody' => $hpage->getBody(),
    ]);
    ?>
    <div class="news_pager_box">
        <div class="news_pager_headers_list">
            <p class='news_pager_headers_item'  id='news'>Новости</p>
            <p class='news_pager_headers_item'   id='news_covid'>ДОСТОВЕРНО о COVID</p>

        </div>
        <div class="news_item_container">
            <div class="news_item_box">
                <?= pubNews::widget(['news_list' => $news_list]);?>
            </div>
            <div class="news_item_covid">
                    <?php
                        //var_dump($covid_data);
                        echo $covid_data['page_body'];
                    ?>
            </div>
        </div>
    </div>

</div>
