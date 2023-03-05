<?php


use frontend\widgets\siteComponents\pubHomepage;
use frontend\widgets\siteComponents\pubNews;



/* @var $this yii\web\View */

$this->title = 'Гимназия №2, Университетский микрорайон, 85, Иркутск';
?>
<div class="site-index">
    <?= pubHomepage::widget(['HpageBody' => $hpage_body])?>
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
                    <?= $covid_data['page_body'] ?>
            </div>
        </div>
    </div>

</div>
