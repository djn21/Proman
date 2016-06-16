<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "{{%profile}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $note
 * @property string $image
 * @property integer $user_id
 *
 * @property \app\models\User $user
 * @property \app\models\ProjectProfile[] $projectProfiles
 */
class Profile extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    public $file;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'note', 'image', 'user_id'], 'required'],
            [['note'], 'string'],
            [['user_id'], 'integer'],
            [['file'], 'file'],
            [['name', 'phone', 'image'], 'string', 'max' => 255]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'note' => 'Note',
            'image' => 'Image',
            'file' => 'Image',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectProfiles()
    {
        return $this->hasMany(\app\models\ProjectProfile::className(), ['profile_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ProfileQuery(get_called_class());
    }
}
