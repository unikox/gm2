<?php

namespace frontend\widgets\siteComponents;
use yii\base\Widget;

//Виджет новостей
class pubNews extends Widget
{

    public $news_list = [];
    private $date;
    private $init_res = '';
	private $res = '';

	public function init()
	{
		parent::init();
        
        foreach ($this->news_list as $news_key => $news) {
            $this->date = \DateTime::createFromFormat('U', $news['create_at']);
            $this->init_res .= '<div class="news_item">';
            $this->init_res .= '    <div class="news_create">'. $this->date->format('d.m.Y').' </div>';
            $this->init_res .= '    <a class="news_title" href =/news/'.$news['id'].'> '.$news['title'].'</a>';
            $this->init_res .='</div>';
        }

	}
	public function run()
	{
        return $this->init_res;
	}
	
}
