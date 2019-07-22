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
$rqd = ArrayHelper::map($rq, 'subject', 'body', 'name' );
$rqt = new Answer;
$ans = $rqt->find(['request_id' => 1])->one();
//$ans = $rqt->getAnswers()->one();
//$this->registerJsFile(Yii::$app->request->baseUrl.'/js/ckeditor/ckeditor.js',['depends' => [\yii\web\JqueryAsset::className()]]);
//$this->registerCssFile("@web/css/message.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()], 'media' => 'print', ], 'css-print-theme');
$this->registerCssFile("@web/css/message.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);


$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="row">
    <div class="col-md-9">
        <div class="mesgs">
<?php

        foreach ($rq as $rqselect) {
            $rq_name = $rqselect->name;
            $rq_body = $rqselect->body;
            $rq_mail = $rqselect->email;
            $rq_date = $rqselect->create_at;
            echo CommentList::widget(  [    'name'=>$rq_name,
                                            'body' => $rq_body, 
                                            'mail'=> $rq_mail, 
                                            'date' => $rq_date,
                                            'type' => "message_rq"
                                            //'type' => "message_an"
                                                ]);
            //echo '<H3>' . $rq_name .' ' . $rq_body .' '. $rq_mail  .' '. $rq_date .' ' .'</H3>';
        }

    print_r(  $ans) ;
        ?>
        </div>
    </div>
    <div class="col-md-3">
        <?php // echo CommentList::widget() ?>
    </div>  
</div>
</div>
