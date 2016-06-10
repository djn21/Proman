<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Expence]].
 *
 * @see Expence
 */
class ExpenceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Expence[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Expence|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}