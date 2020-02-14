<?php

namespace frontend\controllers;

use frontend\models\forms\CompositeModelForm;
use frontend\repository\FormRepository;
use frontend\services\FormService;
use http\Exception;
use Yii;
use yii\web\Controller;

class MainController extends Controller
{
    private $service;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config = []);
        $this->service = new FormService(new FormRepository);
    }

    public function actionIndex()
    {
        $query_params = Yii::$app->request->queryParams;
        $search_model = $this->service->searchModel();
        $data_provider = $this->service->dataProvider($query_params);

        return $this->render('index', [
            'searchModel' => $search_model,
            'dataProvider' => $data_provider,
        ]);

    }

    public function actionCreate()
    {
        $form = new CompositeModelForm([
            'advent', 'characteristic', 'options'
        ]);

        if ($form->load(\Yii::$app->request->post()) && $form->validate()) {

            try {
                $this->service->create($form);
                Yii::$app->session->setFlash('success', "Form created successfully.");

                return $this->redirect(['index']);
            } catch (\Throwable $e) {
                Yii::$app->session->setFlash('error', "Form not saved.");

            }
        }

        return $this->render('create', [
            'advent' => $form->advent,
            'characteristic' => $form->characteristic,
            'options' => $form->options,
        ]);
    }

    public function actionUpdate(int $id)
    {
        $form = new CompositeModelForm([
            'advent', 'characteristic', 'options'
        ], [
            'isNewRecord' => false,
        ]);

        $form->attachForm('advent', $this->service->getAdvent($id));
        $form->attachForm('characteristic', $this->service->getCharacteristic($id));
        $form->attachForm('options', $this->service->getOptions($id));

        if ($form->load(\Yii::$app->request->post()) && $form->validate()) {
            try {
                echo '<pre>';
                var_dump($form->advent->attributes);
                echo '</pre>';
                die();
                $this->service->update($form);
                Yii::$app->session->setFlash('success', "Form updated successfully.");
            } catch (Exception $e) {
                Yii::$app->session->setFlash('error', "Form not updated.");
            }
        }

        return $this->render('update', [
            'advent' => $form->advent,
            'characteristic' => $form->characteristic,
            'options' => $form->options,
            'id' => $id
        ]);
    }

    public function actionView($id)
    {
        $form = new CompositeModelForm([
            'advent', 'characteristic', 'options'
        ]);

        $form->attachForm('advent', $this->service->getAdvent($id));
        $form->attachForm('characteristic', $this->service->getCharacteristic($id));
        $form->attachForm('options', $this->service->getOptions($id));

        $this->service->view($form);

        return $this->render('view', [
            'advent' => $form->advent,
            'characteristic' => $form->characteristic,
            'options' => $form->options,
        ]);
    }

    public function actionDelete($id)
    {
        $form = new CompositeModelForm([
            'advent', 'characteristic', 'options'
        ]);
        $form->attachForm('advent', $this->service->getAdvent($id));
        $form->attachForm('characteristic', $this->service->getCharacteristic($id));
        $form->attachForm('options', $this->service->getOptions($id));

        try {
            $this->service->delete();
            Yii::$app->session->setFlash('success', "Form deleted successfully.");
        } catch (Exception $e) {
            Yii::$app->session->setFlash('error', "Form not deleted.");
        }

        return $this->redirect(['index']);
    }
}