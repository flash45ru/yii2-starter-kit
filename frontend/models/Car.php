<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int $advent_id
 *
 * @property Advent $advent
 * @property Characteristic[] $characteristics
 * @property Options[] $options
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['advent_id'], 'required'],
            [['advent_id'], 'integer'],
            [['advent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Advent::className(), 'targetAttribute' => ['advent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'advent_id' => 'Advent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvent()
    {
        return $this->hasOne(Advent::className(), ['id' => 'advent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCharacteristics()
    {
        return $this->hasMany(Characteristic::className(), ['car_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasMany(Options::className(), ['car_id' => 'id']);
    }
}
