<?php

use yii\helpers\Html;
use frontend\widgets\siteComponents\pubMenu;
use frontend\widgets\siteComponents\pubSlider;
use frontend\widgets\siteComponents\pubHeader;
use frontend\widgets\siteComponents\pubFooter;
use yii\helpers\Url;

$this->registerCssFile("@web/css/gm2style.css", ['depends' => [\yii\bootstrap\BootstrapAsset::class]]);
$this->registerCssFile("@web/css/site.css", ['depends' => [\yii\bootstrap\BootstrapAsset::class]]);
$this->registerJsFile(Yii::$app->request->baseUrl . 'https://maps.api.2gis.ru/2.0/loader.js?pkg=full', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/2gis.js', ['depends' => [\yii\web\JqueryAsset::class]]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/lists.js', ['depends' => [\yii\web\JqueryAsset::class]]);
\Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => 'Гимназия №2, Иркутск']);
\Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => 'сайт, на сайте, Официальный, Страницы, педагогов, педагоги, дорожная карта, образование,
коррекционное, расписание уроков, как добраться, ребенок, детей, школьный, портал, воспитанники, школьники,
школьницы']);
\Yii::$app->view->registerLinkTag(['rel' => 'icon', 'type' => 'image/png', 'href' => Url::to(['/favicon.png'])]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/news.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]);

$session = Yii::$app->session;
$slow_view_mode = $session->get('slow_view_mode');

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <meta name="yandex-verification" content="1c1ee3cd615054d9" />
    <meta name='wmail-verification' content='878c92b24b21e0d2566ca87132de1d91' />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="gm2container">
        <div class="HatBox">
            <?php  if($slow_view_mode=='Enabled'){ ?>
                    <div class="asistent-container">
                        <div class="size-section flex-shrink-0 px-3 py-2">
                            <span>Размер шрифта</span>
                        <ul class="size-select">
                            <li class="size-normal active" data-classname="assist-normal" title="Нормальный">A</li>
                            <li class="size-medium" data-classname="assist-medium" title="Увеличенный">A</li>
                            <li class="size-large" data-classname="assist-large" title="Большой">A</li>
                        </ul>
                    </div>
                    <div class="color-section flex-shrink-0 px-3 py-2">
                        <span>Цвет сайта</span>
                        <ul class="color-select">
                            <li class="color-normal active" data-classname="assist-achromatic" title="Ахроматические цвета">А</li>
                            <li class="color-invert" data-classname="assist-invert" title="Ахроматические цвета с инверсией">А</li>
                        </ul>
                    </div>
                    <div class="image-switcher-box narrow image-section flex-shrink-0 px-3 py-2">
                        <span>Изображения</span>
                        <div class='image-switcher-options'>
                            <span class="image-switcher-on">Вкл</span>
                            <span class="image-switcher-off">Выкл</span>
                        </div>
                    </div>
                    <div class="spacing-section flex-shrink-0 px-3 py-2">
                        <span>Интервал между буквами</span>
                        <ul class="spacing-select">
                            <li class="spacing-normal" data-classname="assist-spacing-normal">Нормальный</li>
                            <li class="spacing-medium active" data-classname="assist-spacing-medium">Увеличенный</li>
                            <li class="spacing-large" data-classname="assist-spacing-large">Большой</li>
                        </ul>
                    </div>
                    <div class="font-section flex-shrink-0 px-3 py-2">
                        <span>Шрифт</span>
                        <ul class="font-select">
                            <li class="font-arial" data-classname="assist-font-arial">Без засечек</li>
                            <li class="font-times active" data-classname="assist-font-times">С засечками</li>
                        </ul>
                    </div>
                </div>
                <?php }
                      if($slow_view_mode=='Enabled'){
                ?>
                <div class="HatSlowView btn btn-outline-success"><a href="/sw">Обычная Версия </a></div>
                <?php }else{ ?>
                <div class="HatSlowView btn btn-outline-success"><a href="/sw">Версия для слабовидящих</a></div>
                <?php  } ?>
                <div class="HatMobMenu btn btn-outline-success">☰</div>
                <div class="HatBoxItemData">
                    <?= pubHeader::widget(['header_data' => $this->params['header']])?>
                </div>
                <div class="HatBoxItem">
                    <div class="HatSlider">
                        <?= pubSlider::widget(['slider_items' => $this->params['slider']]) ?>
                    </div>
                </div>
            </div>
            <div class="ContentBox">
                <div class="ContentItemBox">
                    <div class="ContentItemBaner"><a href="https://gm2-irk.ru/fedback"><img class="HatBaner" src="https://gm2-irk.ru/images/vopros.png"></a></div>
                    <div class="ContentItemMenu">
                        <?= pubMenu::widget([
                            'sections' => $this->params['menu_items']['sections'],
                            'subsections' => $this->params['menu_items']['subsections'],
                            'sectionsAlone' => $this->params['menu_items']['sectionsAlone']
                        ]);
                        ?>
                    </div>
                    <div class="ContentItemVk">
                    <script type="text/javascript" src="https://vk.com/js/api/openapi.js?168"></script>
                    <div id="vk_groups"></div>
                        <script type="text/javascript"> VK.Widgets.Group("vk_groups", {mode: 4, wide: 1, width: 248, height: 400, color1: "FFFFFF", color2: "000000", color3: "5181B8"}, 157586370);</script>
                    </div>
                </div>
                <div class="ContentItem"><?= $content ?></div>
            </div>
        </div>
        <footer class="footer">
            <?= pubFooter::widget([ 'footer_data' => $this->params['footer']]) ?>
            <div class="footer_date">
                <?= date('d.m.Y'); ?>
            </div>
        </footer>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
