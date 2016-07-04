<?php

namespace app\models;

use Yii;
use \app\models\base\Task as BaseTask;

/**
 * This is the model class for table "proman_task".
 */
class Task extends BaseTask
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'start_date', 'end_date', 'dead_line', 'man_hours', 'percentage', 'project_id'], 'required'],
            [['start_date', 'end_date', 'dead_line'], 'safe'],
            [['man_hours', 'percentage'], 'number'],
            [['note'], 'string'],
            [['project_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ]);
    }
	
}
