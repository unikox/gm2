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
        $this->url_data = '
            <url>
                <loc>https://gm2-irk.ru/</loc>
                <lastmod>'.date(DATE_W3C, time()).'</lastmod>
                <changefreq>daily</changefreq>
                <priority>0.9</priority>
            </url>';       
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
        <?xml version="1.0" encoding="UTF-8"?>
            <urlset 
                xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" 
                xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" 
                xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 
                                    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
                $this->url_data
            </urlset>
        XML;
        
        return $this->xmlRes;
    }
}