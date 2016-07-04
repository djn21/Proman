<?php

namespace app\models;

use Yii;
use \app\models\base\Profile as BaseProfile;

/**
 * This is the model class for table "proman_profile".
 */
class Profile extends BaseProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'phone', 'image', 'user_id'], 'required'],
            [['note'], 'string'],
            [['user_id'], 'integer'],
            [['name', 'phone', 'image'], 'string', 'max' => 255]
        ]);
    }
	
}
