<?php

namespace frontend\models\forms;

use trntv\filekit\behaviors\UploadBehavior;
use Yii;
use yii\base\Model;

/**
 * This is the model class for table "advent".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $price
 * @property string $contacts
 * @property string $images
 */
class AdventForm extends Model
{
    public $id;
//    public $title;
//    public $description;
//    public $price;
//    public $contacts;
    public $title = 'auto form';
    public $description = 'auto description';
    public $price = '123456789';
    public $contacts = '11-11-11';

    /**
     * @var array|null
     */
    public $images;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['description', 'price', 'title', 'contacts'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['title', 'contacts'], 'string', 'max' => 255],
            [['images'], 'safe'],
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



    public function init($model = null)
    {
        parent::init();
        if (!is_null($model)){
            $this->attributes = $model->attributes;
            $this->images = $model->images;
        }
    }

}