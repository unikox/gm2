<?php

namespace frontend\widgets\siteComponents;
use yii\base\Widget;


class pubHomepage extends Widget
{

    public $HpageBody = [];
    private $blank_state = '';
    private $startHpage = '';
    private $stopHpage = '';
	private $home_page_size = 0;
	private $res = '';
	public function init()
	{
		parent::init();
		$this->startHpage = '<div class="index-box">';
		$this->home_page_size = count($this->HpageBody);
		if($this->home_page_size < 1) {
			$this->HpageBody[0]['body'] = 'Нет материала для отображения';
		}
		$this->stopHpage = "</div>";

	}
	public function run()
	{
		$this->res = $this->startHpage . $this->HpageBody[0]['body'] . $this->stopHpage;
		return $this->res ;
	}
	
}
