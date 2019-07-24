<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения посетителей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новое сообщение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'subject',
            [
              'attribute' => 'body',
              'contentOptions' => ['class' => 'truncate'],
            ],            
            //'body',
             [
                'attribute'=>'create_at',
                //'label'=>'Создано',
                'format' => ['date', 'php:d-m-Y H:i:s']
                //'headerOptions' => ['width' => '200'],
            ],
            [
                'attribute'=>'update_at',
                //'label'=>'Создано',
                'format' => ['date', 'php:d-m-Y H:i:s']
                //'headerOptions' => ['width' => '200'],
            ],
            //'create_at',
            //'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
