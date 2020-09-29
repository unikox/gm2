<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Новости'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


\yii\web\YiiAsset::register($this);
?>
<div class="news-view">
    <?= date("d.m.Y",$model->create_at) ?>
    <h3><?= Html::encode($this->title) ?></h3>

    <div class="news-view-body"><p> <?php  echo $model->body; ?> </p> </div>



</div>

