<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ответы администрации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новый ответ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'request_id',
                        [
                'attribute' => 'request_id',
                'value' => 'request.name',
            ],
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
