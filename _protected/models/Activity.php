<?php

namespace app\models;

use Yii;
use \app\models\base\Activity as BaseActivity;

/**
 * This is the model class for table "proman_activity".
 */
class Activity extends BaseActivity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'note', 'task_id'], 'required'],
            [['note'], 'string'],
            [['task_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ]);
    }
	
}
