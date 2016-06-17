<?php

namespace app\models;

use Yii;
use \app\models\base\Message as BaseMessage;

/**
 * This is the model class for table "proman_message".
 */
class Message extends BaseMessage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['email_to', 'email_from', 'subject', 'content'], 'required'],
            [['content'], 'string'],
            [['time'], 'safe'],
            [['readed'], 'integer'],
            [['email_to', 'email_from', 'subject'], 'string', 'max' => 255]
        ]);
    }
	
}
