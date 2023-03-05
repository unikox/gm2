<?php

namespace frontend\widgets\siteComponents;
use yii\base\Widget;

class pubFooter extends Widget
{
	public $footer_data;

	public function init()
	{
		parent::init();

		if ($this->footer_data === null) {
			$this->footer_data ='Содержимое подвала не заполнено';
		}

	}
	public function run()
	{

		return $this->footer_data[0]['footer_body'];

	}
	
}
