<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hpage */

$this->title = 'Create Hpage';
$this->params['breadcrumbs'][] = ['label' => 'Hpages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hpage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
