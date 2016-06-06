<?php

namespace app\models;

use Yii;
use \app\models\base\Project as BaseProject;

/**
 * This is the model class for table "proman_project".
 */
class Project extends BaseProject
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'start_date', 'end_date', 'status', 'dead_line', 'note', 'created_at', 'created_by', 'updated_at', 'updated_by', 'lock'], 'required'],
            [['start_date', 'end_date', 'dead_line'], 'safe'],
            [['created_at', 'created_by', 'updated_at', 'updated_by', 'lock'], 'integer'],
            [['name', 'status', 'note'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
