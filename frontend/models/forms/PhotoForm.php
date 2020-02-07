<?php

namespace frontend\models\forms;

use common\behaviors\CacheInvalidateBehavior;
use common\models\WidgetCarousel;
use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\base\Model;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "photo".
 *
 * @property int $id
 * @property int $advent_id
 * @property string $image_id
 */
class PhotoForm extends Model
{
    public $advent_id;
    public $image_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['advent_id'], 'required'],
            [['advent_id', 'image_id'], 'integer'],
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

    public function init($model = null)
    {
        parent::init();
        if (!is_null($model))
            $this->attributes = $model->attributes;
    }
}
