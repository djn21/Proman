<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "{{%activity_profile}}".
 *
 * @property integer $id
 * @property integer $activity_id
 * @property integer $profile_id
 * @property string $time
 *
 * @property \app\models\Activity $activity
 * @property \app\models\Profile $profile
 */
class ActivityProfile extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_id', 'profile_id', 'time'], 'required'],
            [['activity_id', 'profile_id'], 'integer'],
            [['time'], 'number']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%activity_profile}}';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'activity_id' => 'Activity',
            'profile_id' => 'User',
            'time' => 'Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(\app\models\Activity::className(), ['id' => 'activity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(\app\models\Profile::className(), ['id' => 'profile_id']);
    }

    /**
     * @inheritdoc
     * @return \app\models\ActivityProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ActivityProfileQuery(get_called_class());
    }
}
