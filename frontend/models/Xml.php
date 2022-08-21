<?php

namespace app\models;

use Yii;
use yii\base\Model;


/**
 * ContactForm is the model behind the contact form.
 */
class Xml extends Model{

    public $urls = [];
    private $url_data = '';
    private $xmlRes;

    public function getXmlStruct()
    {
        //Подготовка тела XML структуры         
        foreach ($this->urls as $url) {
            $this->url_data = $this->url_data .'
            <url>
                <loc>'.$url['url'].'</loc>
                <lastmod>'.date(DATE_W3C, $url['date']).'</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.5</priority>
            </url>';
        };
        // Финальная сборка XML структуры
        $this->xmlRes = <<<XML
        <?xml version="1.0" encoding="utf-8"?>
            <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
                $this->url_data
            </urlset>
        XML;
        
        return $this->xmlRes;
    }
}