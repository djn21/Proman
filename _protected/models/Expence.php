<?php

namespace app\models;

use Yii;
use \app\models\base\Expence as BaseExpence;

/**
 * This is the model class for table "proman_expence".
 */
class Expence extends BaseExpence
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
