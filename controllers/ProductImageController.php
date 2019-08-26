<?php
namespace app\controllers;

use yii\rest\ActiveController;

class ProductImageController extends ActiveController
{
    public $modelClass = 'app\models\ProductImage';

    public function actions()
    {
        $actions = parent::actions();

        $actions['create']['modelClass'] = 'app\models\Image';
        $actions['create']['scenario'] = 'manual_upload';

        return $actions;
    }
}
?>