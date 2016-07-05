<?php

namespace yii2mod\behaviors\tests\data;

use yii\db\ActiveRecord;
use yii2mod\behaviors\CarbonBehavior;
use yii2mod\behaviors\PurifyBehavior;

/**
 * Class PostModel
 * @package yii2mod\settings\tests\data
 */
class PostModel extends ActiveRecord
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'Post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'carbon' => [
                'class' => CarbonBehavior::className(),
                'attributes' => [
                    'createdAt'
                ]
            ],
            'purify' => [
                'class' => PurifyBehavior::className(),
                'attributes' => ['title'],
                'config' => [
                    'AutoFormat.Linkify' => true,
                    'HTML.TargetBlank' => true,
                    'HTML.Nofollow' => true,
                    'HTML.TidyLevel' => 'heavy'
                ]
            ]
        ];
    }
}
