<?php

namespace app\models;

use Yii;
use \app\models\base\UserDetail as BaseUserDetail;

/**
 * This is the model class for table "proman_user_detail".
 */
class UserDetail extends BaseUserDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['first_name', 'last_name', 'phone', 'role', 'note', 'image', 'user_id'], 'required'],
            [['note'], 'string'],
            [['user_id'], 'integer'],
            [['first_name', 'last_name', 'phone', 'role', 'image'], 'string', 'max' => 255]
        ]);
    }
	
}
