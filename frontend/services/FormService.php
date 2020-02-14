<?php
namespace frontend\services;

use frontend\models\forms\CompositeModelForm;
use frontend\repository\FormRepository;

class FormService
{
    protected $form_repository;

    public function __construct(FormRepository $form_repository)
    {
        $this->form_repository = $form_repository;
    }

    public function searchModel()
    {
        return $this->form_repository->searchModel();
    }
    public function dataProvider($queryParams)
    {
        return $this->form_repository->dataProvider($queryParams);
    }

    public function create(CompositeModelForm $form)
    {
        $this->form_repository->create($form);
    }

    public function update(CompositeModelForm $form)
    {
        return $this->form_repository->update($form);
    }

    public function view(CompositeModelForm $form)
    {
        return $this->form_repository->view($form);

    }

    public function delete()
    {
        return $this->form_repository->delete();
    }

    public function getAdvent($id)
    {
        $advent = $this->form_repository->getAdventById($id);

        return $advent;
    }

    public function getCharacteristic($id)
    {
        $characteristic = $this->form_repository->getCharacteristicById($id);

        return $characteristic;
    }

    public function getOptions($id)
    {
        $options = $this->form_repository->getOptionsById($id);

        return $options;
    }
}