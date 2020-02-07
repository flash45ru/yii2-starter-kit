<?php

namespace app\models;

use common\behaviors\CacheInvalidateBehavior;
use common\models\WidgetCarousel;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "photo".
 *
 * @property int $id
 * @property int $advent_id
 * @property string $image_id
 *
 * @property Advent $advent
 */
class Photo extends \yii\db\ActiveRecord
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
            [['advent_id'], 'required'],
            [['advent_id', 'image_id'], 'integer'],
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
