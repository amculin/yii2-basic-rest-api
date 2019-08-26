<?php

namespace app\models;

use app\customs\BaseActiveRecord as BaseModel;
use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $enable
 */
class Product extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'enable'], 'required'],
            [['description'], 'string'],
            [['enable'], 'integer'],
            [['name'], 'string', 'max' => 64],
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
            'description' => 'Description',
            'enable' => 'Enable',
        ];
    }

    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    public function getProductCategories()
    {
        return $this->hasMany(CategoryProduct::className(), ['product_id' => 'id']);
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {
            $categories = Yii::$app->request->post('categories');
            $images = Yii::$app->request->post('images');

            foreach ($categories as $key => $val) {
                $productCategory = new CategoryProduct();
                $productCategory->product_id = $this->id;
                $productCategory->category_id = $val;
                $productCategory->save();
            }

            $files = \yii\web\UploadedFile::getInstancesByName('images');

            foreach ($files as $key => $object) {
                $image = new Image();
                $image->name = $this->name;
                $image->file = $object->getBaseName() . time() . '.' . $object->getExtension();
                $image->enable = 1;
                $object->saveAs($image::UPLOAD_PATH . $image->file);
                $image->saveProductImage($this->id);
            }
        } else {
            $categories = Yii::$app->request->getBodyParam('categories');
            $oldCategories = CategoryProduct::find()->select(['category_id'])->where(['product_id' => $this->id])
                ->asArray()->all();
            
            $categoryList = [];
            if (isset($oldCategories)) {
                foreach ($oldCategories as $key => $val) {
                    $categoryList[] = $val['category_id'];
                }
            }

            if ($categories != $categoryList) {
                CategoryProduct::deleteAll(['product_id' => $this->id]);

                foreach ($categories as $key => $val) {
                    $categoryProduct = new CategoryProduct();
                    $categoryProduct->product_id = $this->id;
                    $categoryProduct->category_id = $val;
                    $categoryProduct->save();
                }
            }
        }
    }

    public function afterDelete()
    {
        parent::afterDelete();

        ProductImage::deleteAll(['product_id' => $this->id]);
        CategoryProduct::deleteAll(['product_id' => $this->id]);
    }
}
