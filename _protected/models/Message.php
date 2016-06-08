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
            [['subject', 'content', 'time', 'readed', 'id_from', 'id_to'], 'required'],
            [['content'], 'string'],
            [['readed', 'id_from', 'id_to'], 'integer'],
            [['subject', 'time'], 'string', 'max' => 255]
        ]);
    }
	
}
