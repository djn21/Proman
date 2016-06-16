<?php
namespace app\models\base;
use Yii;
/**
 * This is the base model class for table "proman_message".
 *
 * @property integer $id
 * @property string $subject
 * @property string $content
 * @property string $time
 * @property integer $readed
 * @property integer $id_from
 * @property integer $id_to
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
            [['subject', 'content', 'id_from', 'id_to'], 'required'],
            [['content'], 'string'],
            [['time'], 'safe'],
            [['readed', 'id_from', 'id_to'], 'integer'],
            [['subject'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proman_message';
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
     * @inheritdoc
     * @return \app\models\MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\MessageQuery(get_called_class());
    }
}