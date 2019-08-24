<?php

namespace app\customs;

use Yii;

/**
 * This is the base model class for some tables.
 */
class BaseActiveRecord extends \yii\db\ActiveRecord
{
    const ENABLE = 1;
    const DISABLE = 0;

    public $status_list = [false, true];

    public function beforeValidate()
    {
        parent::beforeValidate();

        $this->enable = $this->enable == true ? $this::ENABLE : $this::DISABLE;

        return true;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        $this->enable = $this->status_list[$this->enable];
    }

    public function afterFind()
    {
        $this->enable = $this->status_list[$this->enable];
    }
}