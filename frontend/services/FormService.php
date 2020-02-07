<?php
namespace frontend\services;

use app\models\Characteristic;
use frontend\models\forms\CompositeModelForm;
use frontend\repository\FormRepository;

class FormService
{
    protected $formRepository;

    public function __construct(FormRepository $formRepository)
    {
        $this->formRepository = $formRepository;
    }

    public function searchModel()
    {
        return $this->formRepository->searchModel();
    }
    public function dataProvider($queryParams)
    {
        return $this->formRepository->dataProvider($queryParams);
    }

    public function create(CompositeModelForm $form)
    {
        $this->formRepository->create($form);

    }

    public function update(CompositeModelForm $form)
    {
        return $this->formRepository->update($form);

    }

    public function view(CompositeModelForm $form)
    {
        return $this->formRepository->view($form);

    }

    public function delete()
    {
        return $this->formRepository->delete();
    }

    public function getAdvent($id)
    {
        $advent = $this->formRepository->getAdventById($id);

        return $advent;
    }

    public function getCharacteristic($id)
    {
        $characteristic = $this->formRepository->getCharacteristicById($id);

        return $characteristic;
    }

    public function getOptions($id)
    {
        $options = $this->formRepository->getOptionsById($id);

        return $options;
    }
}