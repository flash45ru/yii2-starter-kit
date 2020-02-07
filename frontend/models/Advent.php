<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advent".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $price
 * @property string $contacts
 *
 * @property Characteristic[] $model
 * @property Characteristic[] $year
 * @property Characteristic[] $carcase
 * @property Characteristic[] $mileage
 *
 * @property Options[] $conditioner
 * @property Options[] $airbags
 * @property Options[] $multimedia
 * @property Options[] $cruise_control
 *
 * @property Car[] $cars
 * @property Photo[] $photos
 */
class Advent extends \yii\db\ActiveRecord
{
    public $model;
    public $year;
    public $carcase;
    public $mileage;
    public $conditioner;
    public $airbags;
    public $multimedia;
    public $cruise_control;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'price', 'title', 'contacts'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['title', 'contacts'], 'string', 'max' => 255],
            [['year', 'mileage', 'conditioner', 'airbags', 'multimedia', 'cruise_control'], 'integer'],
            [['model', 'carcase'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'contacts' => 'Contacts',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCar()
    {
        return $this->hasOne(Car::className(), ['advent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['advent_id' => 'id']);
    }
}
