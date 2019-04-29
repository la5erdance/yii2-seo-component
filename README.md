Yii2 SEO Component
-------------------

Features
---------

 - setTitle
 - setCanonical
 - setDescription
 - setKeywords
 - setRobots
 - setOpenGraphTitle
 - setOpenGraphType
 - setOpenGraphDescription
 - setOpenGraphUrl
 - setOpenGraphImage
 - setMetaTags
 - setOpenGraph
 - setVerifyCodes

Installation
-------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require la5erdance/yii2-seo-component "*"
```

or add

```
"la5erdance/yii2-seo-component": "*"
```

Configuration
---------------

```
'components' => [ 

    'seo' => [
        'class' => 'la5erdance\seo\Seo'
    ],
    
]
```

Usage
------

Set Verify Codes

```
Yii::$app->seo->setMetaTags([
    'title' => $this->title, 
    'description' => '', 
    'keywords' => '',
    'robots' => '',
]);
```

Set OpenGraph

```
Yii::$app->seo->setOpenGraph([
    'title' => $this->title,
    'description' => '', 
    'image' => $this->image, // default: null
    'type' => 'article', // default: 'article'
    'url' => '', // default: Yii::$app->request->absoluteUrl
]);
```

Set Verify Codes

```
Yii::$app->seo->setVerifyCodes([
	'googleVerify' => 'GOOGLE_VERIFY_CODE',
	'yandexVerify' => 'YANDEX_VERIFY_CODE',
]);
```

