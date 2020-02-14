<?php

use frontend\decorator\AddEm;
use frontend\decorator\AddStrong;
use frontend\decorator\AddYesOrNot;

/* @var $this yii\web\View */
/* @var $advent app\models\Advent */
/* @var $characteristic app\models\Characteristic */
/* @var $options app\models\Options */

$this->title = $advent->title;
$this->params['breadcrumbs'][] = ['label' => 'Обьявление', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$decoratorEm = AddEm::decorate($advent);
$decoratorStrong = AddStrong::decorate($advent);
$addYesOrNot = AddYesOrNot::decorate($options);
?>
<div class="advent-create">

    <div class="main-form">
        <div class="row">
            <h3><?= $decoratorEm->title; ?></h3>
            <div><?= $decoratorStrong->description; ?></div>
            <div class="row">
                <?php foreach ($advent->images as $image) { ?>
                    <?php if ($image) { ?>
                        <div class="col-lg-3">
                            <img src="<?= $image['base_url'].$image['path']; ?>" alt=""
                                 style="height: 102px; margin-top: 20px;">
                        </div>
                    <?php } else { ?>
                        <div class="col-lg-3">
                            <img src="https://netsh.pp.ua/wp-content/uploads/2017/08/Placeholder-1.png" alt=""
                                 style="height: 102px; margin-top: 20px;">
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="col-lg-9" style="margin-top: 20px;">
                    <div class="col-lg-2">
                        <div>Цена:</div>
                        <div>Контакты:</div>
                    </div>
                    <div class="3">
                        <div> <?= $decoratorEm->price; ?></div>
                        <div> <?= $decoratorStrong->contacts; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h3>Характеритики</h3>
            <div class="row">
                <div class="col-lg-1">
                    <div>Модель:</div>
                    <div>Год:</div>
                    <div>База:</div>
                    <div>Пробег(км):</div>
                </div>
                <div class="col-lg-3">
                    <div><?= $characteristic->model; ?></div>
                    <div><?= $characteristic->year; ?></div>
                    <div><?= $characteristic->carcase; ?></div>
                    <div><?= $characteristic->mileage; ?></div>
                </div>
            </div>


        </div>
        <div class="row">
            <h3>Доп. опции</h3>
            <div class="row">
                <div class="col-lg-2">
                    <div>Кондиционер:</div>
                    <div>Подушки безопасности:</div>
                    <div>Мультимедиа:</div>
                    <div>Круиз контроль:</div>
                </div>
                <div class="col-lg-3">
                    <div><?= $addYesOrNot->conditioner; ?></div>
                    <div><?= $addYesOrNot->airbags; ?></div>
                    <div><?= $addYesOrNot->multimedia; ?></div>
                    <div><?= $addYesOrNot->cruise_control; ?></div>
                </div>
            </div>
        </div>
    </div>

</div>
