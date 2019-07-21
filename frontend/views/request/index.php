<?php

use yii\helpers\Html;
use app\models\Request;
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
<h1>
<?php 
    $z = Request::find()->all();
   //$z ="xxx";
    //print_r( $dataProvider ); 
    print_r( $z );
?>
</h1>


</div>
