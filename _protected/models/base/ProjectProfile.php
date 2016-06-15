<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "{{%project_profile}}".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $profile_id
 *
 * @property \app\models\Profile $profile
 * @property \app\models\Project $project
 */
class ProjectProfile extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'profile_id'], 'required'],
            [['project_id', 'profile_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%project_profile}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'profile_id' => 'Profile ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(\app\models\Profile::className(), ['id' => 'profile_id']);
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
     * @return \app\models\ProjectProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ProjectProfileQuery(get_called_class());
    }
}
