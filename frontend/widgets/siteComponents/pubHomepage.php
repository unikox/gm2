<?php

namespace frontend\widgets\siteComponents;
use yii\base\Widget;


class pubHomepage extends Widget
{


    public $HpageBody;

    private $blank_state;
    private $startHpage;
    private $stopHpage;

	public function init()
	{
		parent::init();




	$this->startHpage = '<div class="index-box">';
        if (count($this->HpageBody)<1) {
       	    $this->HpageBody[0]['body'] ='Нет материала для отображения';
            //$this->HpageBody ='Нет матерьяла для отображения';
        }
	$this->stopHpage = "</div>";

	}
	public function run()
	{
        echo $this->startHpage;
        	echo $this->HpageBody[0]['body'];
		//var_dump( $this->HpageBody);
	
        //var_dump($this->HpageBody);
        echo $this->stopHpage;
		return "
					
				";

	}
	
}
