<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EngineType */

$this->title = 'Create Engine Type';
$this->params['breadcrumbs'][] = ['label' => 'Engine Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="engine-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
