<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%expence}}".
 *
 * @property integer $id
 * @property string $description
 * @property string $amount
 * @property string $date
 * @property integer $project_id
 *
 * @property \app\models\Project $project
 */
class Expence extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'amount', 'date', 'project_id'], 'required'],
            [['amount'], 'number'],
            [['date'], 'safe'],
            [['project_id'], 'integer'],
            [['description'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%expence}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'amount' => 'Amount',
            'date' => 'Date',
            'project_id' => 'Project ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(\app\models\Project::className(), ['id' => 'project_id']);
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
     * @return \app\models\ExpenceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ExpenceQuery(get_called_class());
    }
}
