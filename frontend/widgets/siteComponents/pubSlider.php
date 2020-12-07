<?php

namespace frontend\widgets\siteComponents;
use yii\base\Widget;
use yii\bootstrap\Carousel;
//$this->registerCssFile("@web/css/message.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

class pubSlider extends Widget
{
	public $slider_items;

	public function init()
	{
		parent::init();

		if ($this->slider_items === null) {
			$this->slider_items ='Слайдер не настроен';
		}

	}
	public function run()
	{

        $ITM = array();
        foreach ($this->slider_items as $sitems){
           $content_item = ['content' => '<a href="'. $sitems['url_dst'] . '"><img src="'. $sitems['url'] .' "/></a>'];
           //$content_item = ['content' => '<img src="'. $sitems['url'] .' "/>'];
           array_push($ITM, $content_item);
        }

        echo Carousel::widget(['items' => $ITM,]);
	}
	
}
