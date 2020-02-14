<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\rbac\models\RbacAuthItemChild */

$this->title = $model->parent;
$this->params['breadcrumbs'][] = ['label' => 'Rbac Auth Item Children', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-auth-item-child-view">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <p>
        <?php echo Html::a('Update', ['update', 'parent' => $model->parent, 'child' => $model->child], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'parent' => $model->parent, 'child' => $model->child], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'parent',
            'child',
        ],
    ]) ?>

</div>
