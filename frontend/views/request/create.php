<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $model app\models\Request */

$this->title = 'Страничка директора';
$this->params['breadcrumbs'][] = ['label' => 'Заданные вопросы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
	<h2 style="text-align: center;">
		<a href="https://gm2-irk.ru/images/Rublevsky_D_V.jpg">
			<img style="border: 0px solid ; width: 116px; height: 170px;" alt="Рублевский Дмитрий Васильевич" src="https://gm2-irk.ru/images//Rublevsky_D_V.jpg">
		</a>
	</h2>
	<div style="text-align: center;">
    	<h3>Рублевский Дмитрий Васильевич </h3>
		<p>График работы: Понедельник - пятница с 9-00 - 18-00</p>
		<p>Телефон/факс: (3952) 36-90-60</p>
		<p>Вопросы отправлять по адресу gimnasium2@inbox.com</p>
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<h3>Уважаемые гости!</h3>
				<p>При написании обращения просим вас ОБЯЗАТЕЛЬНО указывать фамилию, имя и отчество.</p>
				<p>Если ваш вопрос касается ребенка, обучающегося в гимназии, вам необходимо написать его фамилию, имя и класс.</p>
				<p>Анонимные сообщения рассматриваться не будут.</p>
			</div>
			<div class="col-2"></div>
		</div>
	 <h4>Спасибо.</h4>
	</div>

<div class="request-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>
