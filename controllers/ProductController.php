<?php
namespace app\controllers;

use yii\helpers\Url;
use yii\rest\ActiveController;

class ProductController extends ActiveController
{
    public $modelClass = 'app\models\Product';

    public function actions()
    {
        $actions = parent::actions();

        // disable the "delete" and "create" actions
        //unset($actions['delete'], $actions['create']);

        // customize the data provider preparation with the "prepareDataProvider()" method
        $actions['index']['prepareDataProvider'] = [$this, 'listAll'];
        $actions['view']['findModel'] = [$this, 'view'];
        $actions['update']['findModel'] = [$this, 'findModel'];

        return $actions;
    }

    public function listAll()
    {
        $model = $this->modelClass::find(['with' => ['productImages', 'productCategories']])->all();
        $data = [];
        $i = 0;

        foreach ($model as $val) {
            $data[$i]['id'] = $val->id;
            $data[$i]['name'] = $val->name;
            $data[$i]['description'] = $val->description;
            $data[$i]['enable'] = $val->enable;
            $data[$i]['images'] = $val->productImages != null ? $this->getProductImagesList($val->productImages) : [];
            $data[$i]['categories'] = $val->productCategories != null ? $this->getProductCategoriesList($val->productCategories) : [];
            $i++;
        }

        return $data;
    }

    public function view($id)
    {
        $model = $this->findModel($id);

        $data = [];
        $data['id'] = $model->id;
        $data['name'] = $model->name;
        $data['description'] = $model->description;
        $data['enable'] = $model->enable;
        $data['images'] = $model->productImages != null ? $this->getProductImagesList($model->productImages) : [];
        $data['categories'] = $model->productCategories != null ? $this->getProductCategoriesList($model->productCategories) : [];

        return $data;
    }

    public function findModel($id)
    {
        $model = $this->modelClass::find([
            'with' => ['productImages', 'productCategories']
        ])->where(['id' => $id])->one();

        if ($model == null)
            throw new \yii\web\NotFoundHttpException('Object not found: ' . $id);
        
        return $model;
    }

    public function getProductImagesList($productImages)
    {
        $list = [];
        $j = 0;
        
        foreach ($productImages as $value) {
            if ($value->image->enable == 1) {
                $list[$j]['file'] = Url::to('/images/'.$value->image->file, true);
                $list[$j]['name'] = $value->image->name;
                $j++;
            }
        }

        return $list;
    }

    public function getProductCategoriesList($productCategories)
    {
        $list = [];
        $j = 0;
        
        foreach ($productCategories as $value) {
            if ($value->category->enable == 1) {
                $list[$j]['id'] = $value->category->id;
                $list[$j]['name'] = $value->category->name;
                $j++;
            }
        }

        return $list;
    }
}
?>