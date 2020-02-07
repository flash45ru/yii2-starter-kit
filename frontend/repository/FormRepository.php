<?php

namespace frontend\repository;

use app\models\Advent;
use app\models\Car;
use app\models\Characteristic;
use app\models\Options;
use app\models\Photo;
use common\models\WidgetCarousel;
use common\models\WidgetCarouselItem;
use frontend\models\search\Search;
use yii\base\ErrorException;
use yii\web\HttpException;

class FormRepository
{
    private $_advent_model;
    private $_characteristic_model;
    private $_options_model;


    public function searchModel()
    {
        $search_model = new Search();

        return $search_model;
    }

    public function dataProvider($query_params)
    {
        $search_model = self::searchModel();
        $data_provider = $search_model->search($query_params);

        return $data_provider;
    }

    public function widgetCarouselItem()
    {
        $widget_carousel_item = new WidgetCarouselItem();

        return $widget_carousel_item;
    }

    public function create($form)
    {
        $advent_model = new Advent($form->advent->attributes);
        $car_model = new Car();
        $characteristic_model = new Characteristic($form->characteristic->attributes);
        $options_model = new Options($form->options->attributes);
        $photo_model = new Photo($form->options->attributes);

        $transaction = \Yii::$app->db->beginTransaction();
        if ($advent_model->save(false)) {

            $photo_model->advent_id = $advent_model->id;
            if (!$photo_model->save()) {
                throw new ErrorException('Произошла ошибка при сохранении данных в "Photo"');
            }

            $car_model->advent_id = $advent_model->id;
            if (!$car_model->save()) {
                throw new ErrorException('Произошла ошибка при сохранении данных в "Car"');
            }

            $car_id = self::getAdventIdFromCar($advent_model->id);

            $characteristic_model->car_id = $car_id;
            if (!$characteristic_model->save(false)) {
                throw new ErrorException('Произошла ошибка при сохранении данных в "Characteristic"');
            }

            if (!self::checkOptionsAttributes($options_model->attributes)) {
                $options_model->car_id = $car_id;
                if (!$options_model->save(false)) {
                    throw new ErrorException('Произошла ошибка при сохранении данных в "Options"');
                }
            }

            $transaction->commit();
        } else {
            $transaction->rollBack();

            throw new ErrorException('Произошла ошибка при сохранении данных в "Advent"');
        }

        return $advent_model->id;

    }

    public function update($form)
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            $this->_advent_model->attributes = $form->advent->attributes;
            if (!$this->_advent_model->save(false)) {
                throw new ErrorException('Произошла ошибка при обновлении данных в "Advent"');
            }

            $this->_characteristic_model->attributes = $form->characteristic->attributes;
            if (!$this->_characteristic_model->save(false)) {
                throw new ErrorException('Произошла ошибка при обновлении данных в "Characteristic"');
            }

            if ($form->options->attributes['car_id'] === null) {
                $options_model = new Options($form->options->attributes);
                $options_model->car_id = self::getAdventIdFromCar($form->advent->attributes['id']);
                if (!$options_model->save(false)) {
                    throw new ErrorException('Произошла ошибка при сохранении данных в "Options"');
                }
            } else {
                $this->_options_model->attributes = $form->options->attributes;
                if (!$this->_options_model->save(false)) {
                    throw new ErrorException('Произошла ошибка при обновлении данных в "Options"');
                }
            }

            $transaction->commit();
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }

    }

    public function view($form)
    {
        $this->_advent_model->attributes = $form->advent->attributes;
        $this->_characteristic_model->attributes = $form->characteristic->attributes;
        $this->_options_model->attributes = $form->options->attributes;
    }

    public function delete()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try {
            if (!$this->_advent_model->delete()) {
                throw new ErrorException('Произошла ошибка при удалении данных в "Options"');
            }
            $transaction->commit();
        } catch (\ErrorException $e) {
            $transaction->rollBack();

            throw new ErrorException('Произошла ошибка при удалении данных.');

        }
    }

    public function getAdventById($id)
    {
        if ($this->_advent_model === null) {
            $this->_advent_model = Advent::findOne($id);
        }

        return $this->_advent_model;
    }

    public function getCharacteristicById($id)
    {
        if ($this->_characteristic_model === null) {
            $this->_characteristic_model = Characteristic::find()->where(['car_id' => self::getAdventIdFromCar($id)])->one();
        }

        return $this->_characteristic_model;
    }

    public function getOptionsById($id)
    {
        if ($this->_options_model === null) {
            $this->_options_model = Options::find()->where(['car_id' => self::getAdventIdFromCar($id)])->one();
        }

        return $this->_options_model;
    }

    public function getAdventIdFromCar($id)
    {
        $car = Car::find()->where(['advent_id' => $id])->one();

        return $car->id;
    }

    public function checkOptionsAttributes($attributes)
    {
        $check = [];
        foreach ($attributes as $attribute) {
            if ($attribute == 1) {
                $check[] += 1;
            }
        }

        if (!$check > 0) {
            return true;
        }

        return false;
    }
}
//        echo '<pre>';
//        var_dump($model); die();
//        echo '</pre>';