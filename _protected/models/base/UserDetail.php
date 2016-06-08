<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "{{%user_detail}}".
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $role
 * @property string $note
 * @property string $image
 * @property integer $user_id
 *
 * @property \app\models\Message[] $messages
 * @property \app\models\User $user
 */
class UserDetail extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'role', 'note', 'image', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['first_name', 'last_name', 'phone', 'role', 'note', 'image'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user_detail}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'role' => 'Role',
            'note' => 'Note',
            'image' => 'Image',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(\app\models\Message::className(), ['id_from' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
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
     * @return \app\models\UserDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\UserDetailQuery(get_called_class());
    }
}
