<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%activity}}".
 *
 * @property integer $id
 * @property string $description
 * @property string $note
 * @property integer $task_id
 *
 * @property \app\models\Task $task
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
            [['description', 'note', 'task_id'], 'required'],
            [['note'], 'string'],
            [['task_id'], 'integer'],
            [['description'], 'string', 'max' => 255]
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
            'description' => 'Description',
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
     * @inheritdoc
     * @return type mixed
     */ 
    public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
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
