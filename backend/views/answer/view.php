<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Answer */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ответы администрации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<div class="answer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Действительно удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'request_id',
            [
                'attribute'=>'request.name',
                'label'=>'Сообщение от',
            ],

            'body',
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
           // 'create_at',
           // 'update_at',
        ],
    ]) ?>

</div>
