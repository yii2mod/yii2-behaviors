Yii2 behaviors
===============================================

Collection of useful behaviors for Yii Framework 2.0

[![Latest Stable Version](https://poser.pugx.org/yii2mod/yii2-behaviors/v/stable)](https://packagist.org/packages/yii2mod/yii2-behaviors) [![Total Downloads](https://poser.pugx.org/yii2mod/yii2-behaviors/downloads)](https://packagist.org/packages/yii2mod/yii2-behaviors) [![License](https://poser.pugx.org/yii2mod/yii2-behaviors/license)](https://packagist.org/packages/yii2mod/yii2-behaviors)
[![Build Status](https://travis-ci.org/yii2mod/yii2-behaviors.svg?branch=master)](https://travis-ci.org/yii2mod/yii2-behaviors)


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yii2mod/yii2-behaviors "*"
```

or add

```
"yii2mod/yii2-behaviors": "*"
```

to the require section of your `composer.json` file.

Usage
-----

1) **PurifyBehavior**

```php
    public function behaviors()
    {
        return [
            'purify' => [
                'class' => PurifyBehavior::className(),
                'attributes' => ['title', 'content'],
                'config' => [
                    'AutoFormat.Linkify' => true,
                    'HTML.TargetBlank' => true,
                    'HTML.Nofollow' => true
                ]
            ]
        ];
    }
```

2) **CarbonBehavior**


> CarbonBehavior automatically creates a Carbon Instance for one or multiple attributes of an ActiveRecord
  object when `afterFind` event happen.

```php
    public function behaviors()
    {
            return [
                'carbon' => [
                    'class' => CarbonBehavior::className(),
                    'attributes' => [
                        'createdAt',
                        'trialEndAt',
                    ]
                ],
            ];
     }

      $user = UserModel::findOne(1);

      var_dump($user->createdAt->year); // 2016
      var_dump($user->createdAt->month); // 5
      var_dump($user->createdAt->day); // 10

      // change date
      
      $user->trialEndAt->addYear();
      $user->save();

```

> [Carbon Documentation](http://carbon.nesbot.com/docs/#api-introduction)

