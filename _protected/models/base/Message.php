<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "{{%message}}".
 *
 * @property integer $id
 * @property string $email_to
 * @property string $email_from
 * @property string $subject
 * @property string $content
 * @property string $time
 * @property integer $readed
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
            [['email_to', 'email_from', 'subject', 'content'], 'required'],
            [['content'], 'string'],
            [['time'], 'safe'],
            [['readed'], 'integer'],
            [['email_to', 'email_from', 'subject'], 'string', 'max' => 255]
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
            'email_to' => 'Email To',
            'email_from' => 'Email From',
            'subject' => 'Subject',
            'content' => 'Content',
            'time' => 'Time',
            'readed' => 'Readed',
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
