<?php

/**
 * @var $this  yii\web\View
 * @var $model common\models\Page
 */

$this->title = Yii::t('backend', 'Редактирование {modelClass}: ', [
        'modelClass' => 'Page',
    ]) . ' ' . $model->title;

$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

?>

<?php echo $this->render('_form', [
    'model' => $model,
]) ?>
