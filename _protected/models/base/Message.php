<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%message}}".
 *
 * @property integer $id
 * @property string $subject
 * @property string $content
 * @property string $time
 * @property integer $readed
 * @property integer $id_from
 * @property integer $id_to
 *
 * @property \app\models\UserDetail $idTo
 * @property \app\models\UserDetail $idFrom
 */
class Message extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'content', 'time', 'readed', 'id_from', 'id_to'], 'required'],
            [['content'], 'string'],
            [['readed', 'id_from', 'id_to'], 'integer'],
            [['subject', 'time'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%message}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subject' => 'Subject',
            'content' => 'Content',
            'time' => 'Time',
            'readed' => 'Readed',
            'id_from' => 'Id From',
            'id_to' => 'Id To',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTo()
    {
        return $this->hasOne(\app\models\UserDetail::className(), ['id' => 'id_to']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFrom()
    {
        return $this->hasOne(\app\models\UserDetail::className(), ['id' => 'id_from']);
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
     * @return \app\models\MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\MessageQuery(get_called_class());
    }
}
