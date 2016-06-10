<?php

namespace app\models;

use Yii;
use \app\models\base\Income as BaseIncome;

/**
 * This is the model class for table "proman_income".
 */
class Income extends BaseIncome
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['description', 'amount', 'date', 'project_id'], 'required'],
            [['amount'], 'number'],
            [['date'], 'safe'],
            [['project_id'], 'integer'],
            [['description'], 'string', 'max' => 255]
        ]);
    }
	
}
