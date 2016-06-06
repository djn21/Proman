<?php

namespace app\models;

use Yii;
use \app\models\base\Expences as BaseExpences;

/**
 * This is the model class for table "proman_expences".
 */
class Expences extends BaseExpences
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['description', 'amount', 'date', 'project_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'lock'], 'required'],
            [['amount'], 'number'],
            [['date'], 'safe'],
            [['project_id', 'created_at', 'created_by', 'updated_at', 'updated_by', 'lock'], 'integer'],
            [['description'], 'string', 'max' => 255],
            [['lock'], 'default', 'value' => '0'],
            [['lock'], 'mootensai\components\OptimisticLockValidator']
        ]);
    }
	
}
