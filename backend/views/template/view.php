<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Template */

$this->title = 'Просмотр шаблона сайта';
$this->params['breadcrumbs'][] = ['label' => 'шаблоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="template-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'update_at',
            'header_body:html',
            'footer_body:html',
            'posted',
        ],
    ]) ?>

</div>
