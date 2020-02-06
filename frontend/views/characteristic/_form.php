<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Characteristic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="characteristic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'car_id')->textInput() ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'carcase')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mileage')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
