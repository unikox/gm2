<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\widgets\commentList\CommentList;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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

    </div>
    <div class="col-md-3">
        <?php echo CommentList::widget() ?>
    </div>  
</div>
</div>
