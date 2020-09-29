<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Новости');
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="news-index">

    <h3><?= Html::encode($this->title) ?></h3>


    <?php Pjax::begin(); ?>

<div class="news__block">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemOptions' => ['class' => 'item'],
            'itemView' => function ($model, $key, $index, $widget) {

                $res =  "<BR><div class='news_box'>". date("d.m.Y",$model->create_at) ."<div class='news_box_title'>" . Html::a(Html::encode($model->title ), ['view', 'id' => $model->id ]) . "</div>";
                $res = $res . "<div class='news_box_item'>" . Html::encode($model->shortbody ) . "</div>" ;
                $res = $res . "</div><hr/>";
                return   $res ;

            },

        ]) ?>

        <?php Pjax::end(); ?>

    </div>
</div>