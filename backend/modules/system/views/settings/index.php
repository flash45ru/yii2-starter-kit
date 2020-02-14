<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */

use common\components\keyStorage\FormWidget;

/**
 * @var $model \common\components\keyStorage\FormModel
 */

$this->title = 'Application settings';

?>

<?php echo FormWidget::widget([
    'model' => $model,
    'formClass' => '\yii\bootstrap\ActiveForm',
    'submitText' => 'Save',
    'submitOptions' => ['class' => 'btn btn-primary'],
]) ?>
