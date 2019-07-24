<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Answer */
/* @var $form yii\widgets\ActiveForm */
use app\models\Request;


$rqt = Request::find()->all();
$items_rqt = ArrayHelper::map($rqt, 'id', 'name');
$promt_rqt = [ 'prompt' => 'Ответить посетителю' ];
?>

<div class="answer-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'request_id')->dropDownList($items_rqt,$promt_rqt) ?>

    <?= $form->field($model, 'body')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php 
//print_r($rqt);
?>
</div>
