<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DriveType */

$this->title = 'Create Drive Type';
$this->params['breadcrumbs'][] = ['label' => 'Drive Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drive-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
