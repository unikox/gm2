<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Menuitems;
use mihaildev\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model app\models\Pages */
/* @var $form yii\widgets\ActiveForm */
$menuitems = Menuitems::find()->all();
$items_menuitems = ArrayHelper::map($menuitems, 'id', 'name');
$promt_menuitems = [ 'prompt' => 'Выбор раздела' ];
?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menuitem_id')->dropDownList($items_menuitems,$promt_menuitems) ?>
        <?php
        echo $form->field($model, 'page_body')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
            ],
        ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
