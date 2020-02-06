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
 * @property Car[] $cars
 * @property Photo[] $photos
 */
class Advent extends \yii\db\ActiveRecord
{
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

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {
            Yii::$app->db->lastInsertID;
        }
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
    public function getCharacteristic()
    {
        return $this->hasOne(Characteristic::className(), ['advent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['advent_id' => 'id']);
    }
}
