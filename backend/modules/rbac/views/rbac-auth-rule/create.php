<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\rbac\models\RbacAuthRule */

$this->title = 'Create Rbac Auth Rule';
$this->params['breadcrumbs'][] = ['label' => 'Rbac Auth Rules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rbac-auth-rule-create">

    <h1><?php echo Html::encode($this->title) ?></h1>

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
