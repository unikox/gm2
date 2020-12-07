<?php

namespace frontend\widgets\siteComponents;
use yii\base\Widget;
//$this->registerCssFile("@web/css/message.css", ['depends' => [\yii\bootstrap\BootstrapAsset::className()]]);

class pubHeader extends Widget
{
	public $header_data;

	public function init()
	{
		parent::init();

		if ($this->header_data === null) {
			$this->header_data ='Шапка не заполнена';
		}

	}
	public function run()
	{
		return $this->header_data[0]['header_body'];

	}
	
}
