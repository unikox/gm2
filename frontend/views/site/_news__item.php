<?php
/**
 * Created by PhpStorm.
 * User: kox
 * Date: 02.11.2020
 * Time: 5:26
 */

use yii\helpers\Html;

$d = new DateTime();
$d = DateTime::createFromFormat('U', $model->create_at);

?>



    <div class="news_item">
        <div class="news_create"><?= Html::encode($d->format('d.m.Y')) ?></div>
        <?= Html::tag('a', Html::encode($model->title), ['href' => '/index.php?r=news%2Fview&id='.$model->id, 'class' =>'news_title','title' => $model->shortbody ]) ?>
    </div>



