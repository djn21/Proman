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
            [['name', 'start_date', 'end_date', 'dead_line', 'status'], 'required'],
            [['start_date', 'end_date', 'dead_line'], 'safe'],
            [['note'], 'string'],
            [['name', 'status'], 'string', 'max' => 255]
        ]);
    }
	
}
