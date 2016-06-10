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
 */
class UserDetail extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    public $file;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'role', 'file', 'note', 'image'], 'required'],
            [['note'], 'string'],
            [['file'], 'file'],
            [['first_name', 'last_name', 'phone', 'role', 'image'], 'string', 'max' => 255]
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
            'file' => 'Image',
        ];
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
