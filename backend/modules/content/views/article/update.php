<?php

/**
 * @var $this       yii\web\View
 * @var $model      common\models\Article
 * @var $categories common\models\ArticleCategory[]
 */

$this->title = Yii::t('backend', 'Редактирование {modelClass}: ', [
        'modelClass' => 'Article',
    ]) . ' ' . $model->title;

$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';

?>

<?php echo $this->render('_form', [
    'model' => $model,
    'categories' => $categories,
]) ?>
