<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Template */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="template-form">

    <?php $form = ActiveForm::begin(); ?>



    <?php
    echo $form->field($model, 'header_body')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
            'allowedContent' => true,
        ],
    ]);
    ?>
    <?php
    echo $form->field($model, 'footer_body')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
            'allowedContent' => true,
        ],
    ]);
    ?>
    <?= $form->field($model, 'posted')->checkbox() ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
