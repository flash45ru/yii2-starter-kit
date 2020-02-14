<?php

/**
 * @var $this  yii\web\View
 * @var $model common\models\KeyStorageItem
 */

$this->title = Yii::t('backend', 'Редактирование {modelClass}: ', [
        'modelClass' => 'Key Storage Item',
    ]) . ' ' . $model->key;

$this->params['breadcrumbs'][] = ['label' => 'Key Storage Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

?>

<?php echo $this->render('_form', [
    'model' => $model,
]) ?>
