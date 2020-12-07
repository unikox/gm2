<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menuitems */

$this->title = 'Изменить раздел меню: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Разделы меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить раздел меню';
?>
<div class="menuitems-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
