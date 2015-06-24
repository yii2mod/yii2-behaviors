Yii2 behaviors
===============================================

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
1. PurifyBehavior
```php
    public function behaviors()
    {
        return [
            'purify' => [
                'class' => PurifyBehavior::className(),
                'attributes' => ['title', 'content'],
                'config' => [
                    'AutoFormat.Linkify' => 'true',
                    'HTML.TargetBlank' => true,
                    'HTML.Nofollow' => true
                ]
            ]
        ];
    }
```

