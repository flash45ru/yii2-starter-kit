<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $advent app\models\Advent */
/* @var $characteristic app\models\Characteristic */
/* @var $options app\models\Options */
/* @var $form yii\widgets\ActiveForm */

?>
<!--display success message-->
<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Saved!</h4>
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>
<!--display error message-->
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4><i class="icon fa fa-check"></i>Error!</h4>
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>

<div class="main-form">
    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false
    ]); ?>
    <h2>Advent(обьявление)</h2>
    <?= $form->field($advent, 'title')->textInput() ?>
    <?= $form->field($advent, 'description')->textInput() ?>
    <?= $form->field($advent, 'price')->textInput() ?>
    <?= $form->field($advent, 'contacts')->textInput() ?>

    <?= $form->field($advent, 'images')->widget(
        \trntv\filekit\widget\Upload::class,
        [
            'url' => ['/file/storage/upload'],
            'multiple' => true,
            'maxNumberOfFiles' => 2,
        ]
    ) ?>

    <h2>Characteristics(характеритика)</h2>
    <?= $form->field($characteristic, 'model')->textInput() ?>
    <?= $form->field($characteristic, 'year')->textInput() ?>
    <?= $form->field($characteristic, 'carcase')->textInput() ?>
    <?= $form->field($characteristic, 'mileage')->textInput() ?>

    <h2>Options(доп. опции)</h2>
    <?= $form->field($options, 'conditioner')->checkbox() ?>
    <?= $form->field($options, 'airbags')->checkbox() ?>
    <?= $form->field($options, 'multimedia')->checkbox() ?>
    <?= $form->field($options, 'cruise_control')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
