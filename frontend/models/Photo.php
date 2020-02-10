<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "photo".
 *
 * @property int $id
 * @property int $advent_id
 * @property string $path
 * @property string $base_url
 * @property string $type
 *
 * @property Advent $advent
 */
class Photo extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['advent_id'], 'integer'],
            [['path', 'base_url', 'type'], 'string'],
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
            'image_id' => 'Image ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdvent()
    {
        return $this->hasOne(Advent::className(), ['id' => 'advent_id']);
    }
}
