<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "proman_task".
 *
 * @property integer $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property string $dead_line
 * @property string $man_hours
 * @property string $percentage
 * @property string $note
 * @property integer $project_id
 *
 * @property \app\models\Activity[] $activities
 * @property \app\models\Project $project
 * @property \app\models\TaskProfile[] $taskProfiles
 */
class Task extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'start_date', 'end_date', 'dead_line', 'man_hours', 'percentage', 'note', 'project_id'], 'required'],
            [['start_date', 'end_date', 'dead_line'], 'safe'],
            [['man_hours', 'percentage'], 'number'],
            [['note'], 'string'],
            [['project_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proman_task';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'dead_line' => 'Dead Line',
            'man_hours' => 'Man Hours',
            'percentage' => 'Percentage',
            'note' => 'Note',
            'project_id' => 'Project',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivities()
    {
        return $this->hasMany(\app\models\Activity::className(), ['task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(\app\models\Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskProfiles()
    {
        return $this->hasMany(\app\models\TaskProfile::className(), ['task_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\TaskQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TaskQuery(get_called_class());
    }
}
