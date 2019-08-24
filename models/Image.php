<?php

namespace app\models;

use app\customs\BaseActiveRecord as BaseModel;
use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $name
 * @property string $file
 * @property int $enable
 */
class Image extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'file', 'enable'], 'required'],
            [['enable'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['file'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'file' => 'File',
            'enable' => 'Enable',
        ];
    }
}