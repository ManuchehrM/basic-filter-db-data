<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EngineTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Engine Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engine-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Engine Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'engine',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
