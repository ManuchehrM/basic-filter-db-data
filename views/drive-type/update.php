<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DriveType */

$this->title = 'Update Drive Type: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Drive Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="drive-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
