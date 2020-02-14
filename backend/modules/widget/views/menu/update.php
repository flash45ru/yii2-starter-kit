<?php

/**
 * @var $this  yii\web\View
 * @var $model common\models\WidgetMenu
 */

$this->title = Yii::t('backend', 'Редактирование {modelClass}: ', [
        'modelClass' => 'Widget Menu',
    ]) . ' ' . $model->title;

$this->params['breadcrumbs'][] = ['label' => 'Widget Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

?>

<?php echo $this->render('_form', [
    'model' => $model,
]) ?>
