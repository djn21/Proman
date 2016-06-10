<?php

namespace app\models;

use Yii;
use \app\models\base\ProjectUser as BaseProjectUser;

/**
 * This is the model class for table "proman_project_user".
 */
class ProjectUser extends BaseProjectUser
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['project_id', 'user_id'], 'required'],
            [['project_id', 'user_id'], 'integer']
        ]);
    }
	
}
