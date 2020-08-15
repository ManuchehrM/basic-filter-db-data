<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DriveTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Drive Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drive-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Drive Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'drive',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
