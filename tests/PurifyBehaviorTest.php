<?php

namespace yii2mod\behaviors\tests;

use yii2mod\behaviors\tests\data\PostModel;

/**
 * Class PurifyBehaviorTest
 * @package yii2mod\behaviors\tests
 */
class PurifyBehaviorTest extends TestCase
{
    public function testMissingEndTagFixed()
    {
        $input = '<b>Bold';
        $postModel = PostModel::findOne(1);
        $postModel->title = $input;
        $postModel->validate();
        $this->assertEquals('<b>Bold</b>', $postModel->title);
    }

    public function testMaliciousCodeRemove()
    {
        $input = '<img src="javascript:evil();" onload="evil();" />';
        $postModel = PostModel::findOne(1);
        $postModel->title = $input;
        $postModel->validate();
        $this->assertEmpty($postModel->title);
    }

    public function testIllegalNestingFixed()
    {
        $input = '<b>Inline <del>context <div>No block allowed</div></del></b>';
        $postModel = PostModel::findOne(1);
        $postModel->title = $input;
        $postModel->validate();
        $this->assertEquals('<b>Inline <del>context No block allowed</del></b>', $postModel->title);
    }

    public function testDeprecatedTagsConverted()
    {
        $input = '<center>Centered</center>';
        $postModel = PostModel::findOne(1);
        $postModel->title = $input;
        $postModel->validate();
        $this->assertEquals('<div style="text-align:center;">Centered</div>', $postModel->title);
    }

    public function testCssValidation()
    {
        $input = '<span style="color:#COW;float:around;text-decoration:blink;">Text</span>';
        $postModel = PostModel::findOne(1);
        $postModel->title = $input;
        $postModel->validate();
        $this->assertEquals('<span>Text</span>', $postModel->title);
    }

    public function testSaveValidData()
    {
        $input = '<img src="javascript:evil();" onload="evil();" />some text';
        $postModel = PostModel::findOne(1);
        $postModel->title = $input;
        $postModel->save();
        $this->assertEquals('some text', $postModel->title);
    }
}