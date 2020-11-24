<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Template */

$this->title = 'Редактирование шаблона сайта: ';
$this->params['breadcrumbs'][] = ['label' => 'Шаблоны', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="template-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
