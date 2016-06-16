<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ActivityProfile]].
 *
 * @see ActivityProfile
 */
class ActivityProfileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ActivityProfile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ActivityProfile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}