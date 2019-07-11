<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Страничка директора';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
<h2 style="text-align: center;"><a href="http://gm2irk.ru/images/Rublevsky_D_V.jpg"><img style="border: 0px solid ; width: 116px; height: 170px;" alt="Рублевский Дмитрий Васильевич" src="http://gm2irk.ru/images//Rublevsky_D_V.jpg"></a></h2>
	<div style="text-align: center;">
    	<h3>Рублевский Дмитрий Васильевич </h3>
	<p>График работы: Понедельник - пятница с 9-00 - 18-00</p>
	<p>Телефон/факс: (3952) 36-90-60</p>

	<p>Вопросы отправлять по адресу gimnasium2@inbox.com</p>

	<h3>Уважаемые гости!</h3>
	    <p>При написании обращения просим вас ОБЯЗАТЕЛЬНО указывать фамилию, имя и отчество.</p><p> Если ваш вопрос касается ребенка, обучающегося в гимназии, вам необходимо написать его фамилию, имя и класс.</p>
    	 <p>Анонимные сообщения рассматриваться не будут.</p>
	 <h4>Спасибо.</h4>
	</div>
    <div class="row" style="align: center">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'subject') ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
