<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[TaskProfile]].
 *
 * @see TaskProfile
 */
class TaskProfileQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return TaskProfile[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return TaskProfile|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}