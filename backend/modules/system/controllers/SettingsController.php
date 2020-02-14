<?php

namespace backend\modules\system\controllers;


use common\components\keyStorage\FormModel;
use Yii;
use yii\web\Controller;

class SettingsController extends Controller
{

    public function actionIndex()
    {
        $model = new FormModel([
            'keys' => [
                'frontend.maintenance' => [
                    'label' => 'Frontend maintenance mode',
                    'type' => FormModel::TYPE_DROPDOWN,
                    'items' => [
                        'disabled' => 'Disabled',
                        'enabled' => 'Enabled',
                    ],
                ],
                'backend.theme-skin' => [
                    'label' => 'Backend theme',
                    'type' => FormModel::TYPE_DROPDOWN,
                    'items' => [
                        'skin-black' => 'skin-black',
                        'skin-blue' => 'skin-blue',
                        'skin-green' => 'skin-green',
                        'skin-purple' => 'skin-purple',
                        'skin-red' => 'skin-red',
                        'skin-yellow' => 'skin-yellow',
                    ],
                ],
                'backend.layout-fixed' => [
                    'label' => 'Fixed backend layout',
                    'type' => FormModel::TYPE_CHECKBOX,
                ],
                'backend.layout-boxed' => [
                    'label' => 'Boxed backend layout',
                    'type' => FormModel::TYPE_CHECKBOX,
                ],
                'backend.layout-collapsed-sidebar' => [
                    'label' => 'Backend sidebar collapsed',
                    'type' => FormModel::TYPE_CHECKBOX,
                ],
                'backend.sidebar-mini' => [
                    'label' => 'Mini Backend Sidebar on Collapse',
                    'type' => FormModel::TYPE_CHECKBOX,
                ],
            ],
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('alert', [
                'body' => 'Settings was successfully saved',
                'options' => ['class' => 'alert alert-success'],
            ]);

            return $this->refresh();
        }

        return $this->render('index', ['model' => $model]);
    }

}