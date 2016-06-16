<?php

namespace app\models;

use Yii;
use \app\models\base\ActivityProfile as BaseActivityProfile;

/**
 * This is the model class for table "proman_activity_profile".
 */
class ActivityProfile extends BaseActivityProfile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['activity_id', 'profile_id', 'time'], 'required'],
            [['activity_id', 'profile_id'], 'integer'],
            [['time'], 'number']
        ]);
    }
	
}
