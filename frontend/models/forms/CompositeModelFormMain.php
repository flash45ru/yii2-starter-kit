<?php
namespace frontend\models\forms;

use yii\base\Model;
use yii\helpers\ArrayHelper;

abstract class CompositeModelFormMain extends Model
{
    /**
     * @var Model[]
     */
    private $_forms = [];

    abstract protected function internalForms();

    public function load($data, $formName = null)
    {
//        echo '<pre>';
//        var_dump($data);
//        echo '</pre>';
//        die();
        $success = parent::load($data, $formName);
        foreach ($this->_forms as $name => $form) {
            if (is_array($form)) {
                $success = Model::loadMultiple($form, $data, $formName === null ? null : $name) || $success;
            } else {
                $success = $form->load($data, $formName !== '' ? null : $name) || $success;
            }
        }
        return $success;
    }

    public function validate($attributeNames = null, $clearErrors = true)
    {
        if ($attributeNames !== null) {
            $parentNames = array_filter($attributeNames, 'is_string');
            $success = $parentNames ? parent::validate($parentNames, $clearErrors) : true;
        } else {
            $success = parent::validate(null, $clearErrors);
        }

        foreach ($this->_forms as $name => $form) {

            if ($attributeNames === null || array_key_exists($name, $attributeNames) || in_array($name, $attributeNames, true)) {
                $innerNames = ArrayHelper::getValue($attributeNames, $name);
                if (is_array($form)) {
                    $success = Model::validateMultiple($form, $innerNames) && $success;
                } else {
                    $success = $form->validate($innerNames, $clearErrors) && $success;
                }
            }
        }

        return $success;
    }

    public function __get($name)
    {
        if (isset($this->_forms[$name])) {
            return $this->_forms[$name];
        }
        return parent::__get($name);
    }

    public function __set($name, $value)
    {
        if (in_array($name, $this->internalForms(), true)) {
            $this->_forms[$name] = $value;
        } else {
            parent::__set($name, $value);
        }
    }

    public function __isset($name)
    {
        return isset($this->_forms[$name]) || parent::__isset($name);
    }



}