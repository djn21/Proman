<?php

namespace app\models;

use Yii;
use \app\models\base\ProjectProfile as BaseProjectProfile;

/**
 * This is the model class for table "proman_project_profile".
 */
class ProjectProfile extends BaseProjectProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['project_id', 'profile_id', 'role'], 'required'],
            [['project_id', 'profile_id'], 'integer'],
            [['role'], 'string', 'max' => 255]
        ]);
    }
	
}
