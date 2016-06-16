<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "{{%task_profile}}".
 *
 * @property integer $id
 * @property integer $task_id
 * @property integer $profile_id
 * @property string $role
 *
 * @property \app\models\Profile $profile
 * @property \app\models\Task $task
 */
class TaskProfile extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'profile_id', 'role'], 'required'],
            [['task_id', 'profile_id'], 'integer'],
            [['role'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%task_profile}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task',
            'profile_id' => 'User',
            'role' => 'Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(\app\models\Profile::className(), ['id' => 'profile_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(\app\models\Task::className(), ['id' => 'task_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\TaskProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TaskProfileQuery(get_called_class());
    }
}
