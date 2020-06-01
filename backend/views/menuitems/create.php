<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Menuitems */

$this->title = 'Новый раздел меню';
$this->params['breadcrumbs'][] = ['label' => 'Разделы меню', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menuitems-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
