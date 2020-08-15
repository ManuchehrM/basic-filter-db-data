<?php
if (!empty($dataProvider->getModels())):
    echo '<div class="row">';
    foreach ($dataProvider->getModels() as $item):
?>
        <div class="col-lg-4">
            <h2><?= $item->brand->brand ?></h2>
            <p><strong>Модел:</strong> <?= $item->model->model ?></p>
            <p><strong>Тип двигателя:</strong> <?= $item->driveType->drive ?></p>
            <p><strong>Привод:</strong> <?= $item->engineType->engine ?></p>
            <p><a class="btn btn-default" href="/car/view?id=<?= $item->id ?>">More Info &raquo;</a></p>
        </div>
<?php
    endforeach;
    echo '</div>';
    echo \yii\widgets\LinkPager::widget([
        'pagination'=>$dataProvider->pagination,
    ]);
else:
?>
    <h2>Результат не найдено!</h2>

<?php
endif;
?>