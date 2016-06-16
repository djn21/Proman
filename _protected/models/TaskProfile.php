<?php

namespace app\models;

use Yii;
use \app\models\base\TaskProfile as BaseTaskProfile;

/**
 * This is the model class for table "proman_task_profile".
 */
class TaskProfile extends BaseTaskProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['task_id', 'profile_id', 'role'], 'required'],
            [['task_id', 'profile_id'], 'integer'],
            [['role'], 'string', 'max' => 255]
        ]);
    }
	
}
