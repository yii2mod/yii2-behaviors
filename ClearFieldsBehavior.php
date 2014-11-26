<?php

namespace yii2mod\behaviors;

use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * ClearFieldsBehavior class file.
 * @author Igor Chepurnoy
 */
class ClearFieldsBehavior extends Behavior
{

    /**
     * Attribute on which depend the fields
     * @var string
     */
    public $attribute;

    /**
     * Value to compare
     * @var
     */
    public $compareValue;

    /**
     * All fields in which the value will be replaced on setValue
     * @var
     */
    public $fields;

    /**
     * Value to be assigned to all fields
     * @var
     */
    public $setValue;

    /**
     * @return array
     */
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    /**
     * Responds to {@link CActiveRecord::onAfterFind} event.
     * Override this method and make it public if you want to handle the corresponding event
     * of the {@link CBehavior::owner owner}.
     * @internal param \yii2mod\set\behaviors\CEvent $event event parameter
     */
    public function beforeValidate()
    {
        if ($this->owner->{$this->attribute} == $this->compareValue) {
            foreach ($this->fields as $field) {
                $this->owner->{$field} = $this->setValue;
            }
        }
    }
}


