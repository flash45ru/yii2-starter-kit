<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $advent app\models\Advent */
/* @var $characteristic app\models\Characteristic */
/* @var $options app\models\Options */

$this->title = $advent->title;
$this->params['breadcrumbs'][] = ['label' => 'Обьявление', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advent-create">

    <div class="main-form">
       <div class="row">
           <h3><?= $advent->title; ?></h3>
           <div><?= $advent->description; ?></div>
           <div class="row">
               <div class="col-lg-3">
                   <img src="http://yii2-starter-kit.localhost/img/yii2-starter-kit.gif" alt="" style="height: 102px; margin-top: 20px;">
               </div>
               <div class="col-lg-9" style="margin-top: 20px;">
                   <div class="col-lg-2">
                       <div>Цена:</div>
                       <div>Контакты:</div>
                   </div>
                   <div class="3">
                       <div> <?= $advent->price; ?></div>
                       <div> <?= $advent->contacts; ?></div>
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
                    <div><?= ($options->conditioner)?'Есть':'Нет'; ?></div>
                    <div><?= ($options->airbags)?'Есть':'Нет'; ?></div>
                    <div><?= ($options->multimedia)?'Есть':'Нет'; ?></div>
                    <div><?= ($options->cruise_control)?'Есть':'Нет'; ?></div>
                </div>
            </div>
        </div>
    </div>

</div>
