<?php
/**
 * @link https://github.com/la5erdance/yii2-seo-component
 * @copyright Copyright (c) 2019 La5erdance!
 * @author Andrey Tanasov <info@tanasov.net>
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace la5erdance\seo;

use Yii;
use yii\base\Component;
use yii\helpers\Url;

/**
 * Class Seo
 * @package frontend\components
 */
class Seo extends Component
{
    /**
     * Register Title
     *
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title = '')
    {
        if ($title) {
            Yii::$app->view->title = $title;
        }
        return $this;
    }

    /**
     * Register Description Meta Tag
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description = '')
    {
        if ($description) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'description', 'content' => $description], 'description'
            );
        }

        return $this;
    }

    /**
     * Register Keywords Meta Tag
     *
     * @param string $keywords
     *
     * @return $this
     */
    public function setKeywords($keywords = '')
    {
        if ($keywords) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'keywords', 'content' => $keywords ], 'keywords'
            );
        }

        return $this;
    }

     /**
     * Register Robots Meta Tag
     *
     * @param string $robots
     *
     * @return $this
     */
    public function setRobots($robots = '')
    {
        if ($robots) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'robots', 'content' => $robots], 'robots'
            );
        }

        return $this;
    }

    /**
     * Set Meta Informations
     *
     * @param array $settings
     */
    public function setMetaTags($settings)
    {
        $this->setTitle($settings['title'])
            ->setDescription($settings['description'])
            ->setKeywords($settings['keywords'])
            ->setRobots($settings['robots']);
    }

    /**
     * Register Canonical url
     *
     * @param string $url
     *
     * @return $this
     */
    public function setCanonical($url = '')
    {
        $url = $url ?: Url::canonical();

        Yii::$app->view->registerLinkTag(
            ['href' => $url, 'rel' => 'canonical'], 'canonical'
        );

        return $this;
    }

    /**
     * Register OpenGraph type
     *
     * @param string $type
     *
     * @return $this
     */
    public function setOpenGraphType($type = 'article')
    {
        if($type) {
            Yii::$app->view->registerMetaTag(
                ['property' => 'og:type', 'content' => $type], 'og:type'
            );
        }

        return $this;
    }

    /**
     * Register OpenGraph title
     *
     * @param string $title
     *
     * @return $this
     */
    public function setOpenGraphTitle($title = '')
    {
        $title = $title ?: $this->title;

        if ($title) {
            Yii::$app->view->registerMetaTag(
                ['property' => 'og:title', 'content' => $title], 'og:title'
            );
        }

        return $this;
    }

    /**
     * Register OpenGraph description
     *
     * @param string $description
     *
     * @return $this
     */
    public function setOpenGraphDescription($description = '')
    {
        if ($description) {
            Yii::$app->view->registerMetaTag(
                ['property' => 'og:description', 'content' => $description], 'og:description'
            );
        }

        return $this;
    }

    /**
     * Register OpenGraph url
     *
     * @param string $url
     *
     * @return $this
     */
    public function setOpenGraphUrl($url = '')
    {
        $url = $url ?: Yii::$app->request->absoluteUrl;

        Yii::$app->view->registerMetaTag(
            ['property' => 'og:url', 'content' => $url], 'og:url'
        );

        return $this;
    }

    /**
     * Register OpenGraph image
     *
     * @param string $imageUrl
     *
     * @return $this
     */
    public function setOpenGraphImage($url = '')
    {
        $url = Url::base(true)  . $url;
        // $url = Url::to($url, true);

        if($url) {
            Yii::$app->view->registerMetaTag(
                ['property' => 'og:image', 'content' => $url], 'og:image'
            );
        }

        return $this;
    }

    /**
     * Set Open Graph
     *
     * @param array $settings
     */
    public function setOpenGraph($settings)
    {
        $this->setOpenGraphType($settings['type'])
            ->setOpenGraphTitle($settings['title'])
            ->setOpenGraphDescription($settings['description'])
            ->setOpenGraphUrl($settings['url'])
            ->setOpenGraphImage($settings['image']);
    }

    /**
     * Set Verifications Meta Tags
     *
     * @param array $verifyCodes
     *
     * @return $this
     */
    public function setVerifyCodes(array $verifyCodes = [])
    {
        if($verifyCodes['googleVerify']) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'google-site-verification', 'content' => $verifyCodes['googleVerify']], 'google-site-verification'
            );
        }

        if($verifyCodes['yandexVerify']) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'yandex-verification', 'content' => $verifyCodes['yandexVerify']], 'yandex-verification'
            );
        }

        return $this;
    }
}