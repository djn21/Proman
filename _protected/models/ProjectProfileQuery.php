<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProjectProfile]].
 *
 * @see ProjectProfile
 */
class ProjectProfileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ProjectProfile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProjectProfile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}