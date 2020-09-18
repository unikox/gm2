<?php

namespace frontend\widgets\siteComponents;
use yii\base\Widget;


class pubHomepage extends Widget
{


    public $HpageBody;


    private $startHpage;
    private $stopHpage;

	public function init()
	{
		parent::init();




		$this->startHpage = '<div class="index-box">';
        if ($this->HpageBody === null) {
            $this->HpageBody ='Нет матерьяла для отображения';
        }
		$this->stopHpage = "</div>";

	}
	public function run()
	{
        echo $this->startHpage;
        echo $this->HpageBody[0]['body'];
        //var_dump($this->HpageBody);
        echo $this->stopHpage;
		return "
					
				";

	}
	
}
