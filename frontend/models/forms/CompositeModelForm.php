<?php

namespace frontend\models\forms;

class CompositeModelForm extends CompositeModelFormMain
{
    private $isNewRecord = true;
    private $init_forms = array(
        'advent' => AdventForm::class,
        'characteristic' => CharacteristicForm::class,
        'options' => OptionsForm::class,
    );
    private $internal_forms = [
        'advent', 'characteristic', 'options'
    ];
    private $new_forms = [];

    public function __construct($formNames, $config = [])
    {
        parent::__construct($config);
        $this->new_forms = $formNames;
        $this->init();
    }

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

        foreach ($this->new_forms as $form_name) {
            $this->__set($form_name, new $this->init_forms[$form_name]);
        }
    }

    /**
     * @return bool
     */
    public function isNewRecord(): bool
    {
        return $this->isNewRecord;
    }

    /**
     * @param bool $isNewRecord
     */
    public function setIsNewRecord(bool $isNewRecord): void
    {
        $this->isNewRecord = $isNewRecord;
    }

    protected function internalForms()
    {
        return $this->internal_forms;
    }

    public function attachForm($name, $model)
    {
        $this->__get($name)->init($model);
    }
}