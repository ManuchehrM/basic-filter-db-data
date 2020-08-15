<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = $title;
?>
<div class="site-index">

    <div class="jumbotron">
        <h2> <?= $this->title ?> </h2>
    </div>
    <div class="body-content">

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <?= Html::input('text', 'brand', ($request->get('brand') != '') ? $request->get('brand'): '', ['class' => 'form-control brand', 'placeholder' => 'Brand']) ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <?= Html::input('text', 'model', ($request->get('model') != '') ? $request->get('model'): '', ['class' => 'form-control model', 'placeholder' => 'Model']) ?>
                </div>
            </div>
            <button class="btn btn-success" id="search-btn">Поиск</button>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Тип двигателя:</label>
                    <?= Html::dropDownList('engine', '', $engines, ['class' => 'form-control engine']) ?>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group">
                    <label>Привод:</label>
                    <?= Html::dropDownList('drive', '', $drives, ['class' => 'form-control drive']) ?>
                </div>
            </div>
        </div>
        <div class="row product-content">
            <?php foreach ($dataProvider->getModels() as $data): ?>
            <div class="col-lg-4">
                <h2><?= $data->brand->brand ?></h2>
                <p><strong>Модел:</strong> <?= $data->model->model ?></p>
                <p><strong>Тип двигателя:</strong> <?= $data->driveType->drive ?></p>
                <p><strong>Привод:</strong> <?= $data->engineType->engine ?></p>
                <p><a class="btn btn-default" href="/car/view?id=<?= $data->id ?>">More Info &raquo;</a></p>
            </div>
            <?php endforeach ?>
        </div>
        <?php
            echo \yii\widgets\LinkPager::widget([
                'pagination'=>$dataProvider->pagination,
            ]);
        ?>
    </div>
</div>
