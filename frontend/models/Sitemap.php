<?php

namespace app\models;


use Yii;
use yii\base\Model;

use app\models\Pages as ModelsPages;
use app\models\News as ModelsNews;
use app\models\Xml ;
use yii\web\UrlManager;

/**
 * ContactForm is the model behind the contact form.
 */
class Sitemap extends Model{

    private $siteMapRes;
    private $news = [];
    private $news_list_url;
    private $pages = [];
    private $pages_list_url;
    private $xml;
    private $base_url;
    private $url_page = '';
    private $url_news = '';
    private $url_list = [];
    private $counter = 0;
    
    function __construct()
    {
        $this->pages = ModelsPages::getListPagesId();
        $this->news = ModelsNews::getListNewsId();
        $this->xml = new Xml();
        $this->base_url = 'https://'.$_SERVER['SERVER_NAME'];
        $this->url_page = $this->base_url . '/pages/' ;
        $this->url_news = $this->base_url . '/news/' ;
    }
    public function getSiteMap()
    {
        //Подготовка url для стандартных страниц
        if(is_array($this->pages)){
            foreach ($this->pages as $pageKey => $page) {
                $this->pages_list_url[$this->counter] = ['url' => $this->url_page.$page['id'], 'date' => $page['updated_at']];
                ++$this->counter;
            }
        }

        //Подготовка url для страниц новостей
        if(is_array($this->news)){
            foreach ($this->news as $newsKey => $news) {
                $this->pages_list_url[$this->counter] = ['url'=>$this->url_news.$news['id'], 'date' => $news['update_at']];
                ++$this->counter;
            }
        }
        $this->xml->urls =$this->pages_list_url;
        $this->siteMapRes = $this->xml->getXmlStruct();

        return $this->siteMapRes;
    }
}