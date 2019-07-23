<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\widgets\commentList\CommentList;
use yii\helpers\ArrayHelper;
use app\models\Request;
use app\models\Answer;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$rq = Request::find()->all();
$an = Answer::find()->all();


//$this->registerJsFile(Yii::$app->request->baseUrl.'/js/ckeditor/ckeditor.js',['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerCssFile("@web/css/message.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()], 'media' => 'print', ], 'css-print-theme');
$this->registerCssFile("@web/css/message.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);


$this->title = 'Обратная связь';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="site-contact">
    
    <h2 style="text-align: center;"><a href="http://gm2irk.ru/images/Rublevsky_D_V.jpg"><img style="border: 0px solid ; width: 116px; height: 170px;" alt="Рублевский Дмитрий Васильевич" src="http://gm2irk.ru/images//Rublevsky_D_V.jpg"></a></h2>
    <div style="text-align: center;">
        <h3>Рублевский Дмитрий Васильевич </h3>
        <p>График работы: Понедельник - пятница с 9-00 - 18-00</p>
        <p>Телефон/факс: (3952) 36-90-60</p>

        <p>Вопросы отправлять по адресу gimnasium2@inbox.com</p>

        <h3>Уважаемые гости!</h3>
        <p>При написании обращения просим вас ОБЯЗАТЕЛЬНО указывать фамилию, имя и отчество.</p><p> Если ваш вопрос касается ребенка, обучающегося в гимназии, вам необходимо написать его фамилию,имя и класс.</p>
         <p>Анонимные сообщения рассматриваться не будут.</p>
     <h4>Спасибо.</h4>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="mesgs">
<?php
        
        foreach ($rq as $rqselect) {
            $rq_id = $rqselect->id;
            $rq_name = $rqselect->name;
            $rq_body = $rqselect->body;
            $rq_mail = $rqselect->email;

            $rq_date = Yii::$app->formatter->asDate($rqselect->create_at);
            echo CommentList::widget(  [    'name'=>$rq_name,
                                            'body' => $rq_body, 
                                            'mail'=> $rq_mail, 
                                            'date' => $rq_date,
                                            'type' => 'message_rq',

                                                ]);
            //echo '<H3>' . $rq_name .' ' . $rq_body .' '. $rq_mail  .' '. $rq_date .' ' .'</H3>';
            
                foreach ($an as $anselect) {
                    $rqid = $anselect->request_id;
                    $an_date = Yii::$app->formatter->asDate($anselect->create_at);

                    if ($rqid  == $rq_id) {
                    
                
                        echo CommentList::widget(  [
                                            'name'=>'Администрация',
                                            'body' => $anselect->body, 
                                            'mail'=> 'gimnasium2@inbox.com', 
                                            'date' => $an_date,
                                            'type' => 'message_an'
                                                            ]);
                    //print_r($rqid);
                    }
                }
            
        }

    //print_r(  $and) ;
        ?>
        </div>
    </div>
    <p align="center">
        <?= Html::a('Новое сообщение', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
</div>
