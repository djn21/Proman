<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "{{%activity}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $note
 * @property integer $task_id
 *
 * @property \app\models\Task $task
 * @property \app\models\ActivityProfile[] $activityProfiles
 */
class Activity extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'note', 'task_id'], 'required'],
            [['note'], 'string'],
            [['task_id'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%activity}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'note' => 'Note',
            'task_id' => 'Task',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(\app\models\Task::className(), ['id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivityProfiles()
    {
        return $this->hasMany(\app\models\ActivityProfile::className(), ['activity_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\ActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ActivityQuery(get_called_class());
    }
}
