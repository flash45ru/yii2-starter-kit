<?php
namespace frontend\models\forms;

use app\models\Car;
use yii\base\Model;

/**
 * This is the model class for table "characteristic".
 *
 * @property int $id
 * @property int $car_id
 * @property string $model
 * @property int $year
 * @property string $carcase
 * @property int $mileage
 */
class CharacteristicForm extends Model
{
    public $car_id;
    public $model;
    public $year;
    public $carcase;
    public $mileage;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year', 'mileage', 'model', 'carcase'], 'required'],
            [['car_id', 'year', 'mileage'], 'integer'],
            [['model', 'carcase'], 'string', 'max' => 255],
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
            'model' => 'Model',
            'year' => 'Year',
            'carcase' => 'Carcase',
            'mileage' => 'Mileage',
        ];
    }

    public function init($model = null)
    {
        parent::init();
        if (!is_null($model))
            $this->attributes = $model->attributes;
    }

}