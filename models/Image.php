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
    const UPLOAD_PATH = 'images/';

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
            [['name', 'file', 'enable'], 'required', 'on' => 'manual_upload'],
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

    public function saveProductImage($productId)
    {
        $this->save();

        $productImage = new ProductImage();
        $productImage->product_id = $productId;
        $productImage->image_id = $this->id;
        $productImage->save();
    }

    public function preparedData()
    {
        $data = [];
        $productId = Yii::$app->request->post('product_id');
        $data['file'] = \yii\web\UploadedFile::getInstanceByName('images');
        $data['product'] = Product::find()->where(['id' => $productId])->one();

        return $data;
    }

    public function beforeValidate()
    {
        parent::beforeValidate();

        $data = $this->preparedData();

        $this->name = $data['product']->name;
        $this->file = $data['file']->getBaseName() . time() . '.' . $data['file']->getExtension();
        $this->enable = 1;

        return true;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert && $this->scenario == 'manual_upload') {
            $data = $this->preparedData();

            $data['file']->saveAs($this::UPLOAD_PATH . $this->file);
            $productImage = new ProductImage();
            $productImage->image_id = $this->id;
            $productImage->product_id = $data['product']->id;
            $productImage->save();
        }
    }
}