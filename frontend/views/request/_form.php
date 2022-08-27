<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\Request */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="request-form">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => "70%"]) ?>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

            <div class="form-group">
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-1"><?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?></div>
                    <div class="col-1"></div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
