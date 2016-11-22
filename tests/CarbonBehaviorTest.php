<?php

namespace yii2mod\behaviors\tests;

use yii2mod\behaviors\tests\data\PostModel;

/**
 * Class CarbonBehaviorTest
 *
 * @package yii2mod\behaviors\tests
 */
class CarbonBehaviorTest extends TestCase
{
    public function testAccessToCarbonMethods()
    {
        $postModel = PostModel::findOne(1);
        // test some Carbon functions
        $this->assertEquals(date('Y'), $postModel->createdAt->year);
        $this->assertEquals(date('m'), $postModel->createdAt->month);
        $this->assertEquals(date('d'), $postModel->createdAt->day);
    }

    public function testChangeDate()
    {
        $postModel = PostModel::findOne(1);
        $postModel->createdAt->addYear();
        $postModel->save(false);
        $this->assertEquals(date('Y', strtotime('+1 year')), $postModel->createdAt->year);
    }
}
