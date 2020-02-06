<?php

namespace frontend\models\forms;

use app\models\Car;
use yii\base\Model;

/**
 * This is the model class for table "options".
 *
 * @property int $id
 * @property int $car_id
 * @property int $conditioner
 * @property int $airbags
 * @property int $multimedia
 * @property int $cruise_control
 */
class OptionsForm extends Model
{
    public $car_id;
    public $conditioner;
    public $airbags;
    public $multimedia;
    public $cruise_control;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['car_id', 'conditioner', 'airbags', 'multimedia', 'cruise_control'], 'integer'],
            //[['car_id'], 'exist', 'skipOnError' => true, 'targetClass' => Car::className(), 'targetAttribute' => ['car_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'car_id' => 'Car ID',
            'conditioner' => 'Conditioner',
            'airbags' => 'Airbags',
            'multimedia' => 'Multimedia',
            'cruise_control' => 'Cruise Control',
        ];
    }

    public function init($model = null)
    {
        parent::init();
        if (!is_null($model))
            $this->attributes = $model->attributes;
    }
}