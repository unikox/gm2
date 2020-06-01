<?php

namespace frontend\widgets\siteComponents;
use yii\base\Widget;


class pubMenu extends Widget
{

	public $name;
    public $sections;
    public $subsections;
    private $start;
    private $startMenu;
    private $bodyMenu;
    private $stopMenu;
    private $startMenuitem;
    private $preBodyMenuItem;
    private $bodyMenuItem;
    private $stopMenuitem;
    private $preStopMenuitem;
    private $menuItemId;
    private $menuEq;
    private $menuItemHeader;
	public function init()
	{
		parent::init();

		if ($this->name === null) {
			$this->name ='безимянный раздел';
		}

		if ($this->sections === null) {
			$this->sections ='безимянный раздел';
		}
		if ($this->subsections === null) {
			$this->subsections = 'без позиции';
		}
		
		$this->start = "<ul class='nav menu-mainmenu'> ";
		$this->startMenu = " <li>
									<a href='#group_menu";
		$this->bodyMenu="' class='accordion-toggle collapsed'  data-toggle='collapse'>";
		$this->stopMenu = "</a></li>";
		$this->startMenuitem = "<div id='group_menu";
		$this->preBodyMenuItem="' class='panel-collapse collapse'><ul>";
		$this->bodyMenuItem="<li><a href='/info_add/platezhnye_rekvizity'>";
		$this->preStopMenuitem = "</a></li>";
		$this->stopMenuitem = "</ul></div>";
		$this->menuItemHeader = '';
	}
	public function run()
	{
		echo $this->start;
		foreach ($this->sections as $key => $variable) {
			foreach ($variable as $key => $value) {
				if ($key == "id"){
					$this->menuItemId=$value;
				}
				if ($key == "name"){
					echo $this->startMenu;
					echo $this->menuItemId;
					echo $this->bodyMenu;
					//echo $value . $this->menuItemHeader .$this->menuItemId;

					echo $value ;

					if( $this->menuItemHeader != $this->menuItemId ){
						echo $this->startMenuitem;
						echo $this->menuItemId;
						echo $this->preBodyMenuItem;
						
						$this->menuItemHeader = $this->menuItemId;
						//echo "menuItemId:".$this->menuItemId;						
					}

					foreach ($this->subsections as $subsectionskey => $subsectionsvalue) {

						foreach ($subsectionsvalue as $subsectkey => $subsectvalue) {

							if( $subsectkey == "name" and $this->menuEq ){

									echo $this->bodyMenuItem;
									echo $subsectvalue;	
									echo $this->preStopMenuitem;
									$eq=false;
							}							
							if( $subsectkey == 'menuitem_id' ){
								if((int)$subsectvalue == $this->menuItemId){
									$this->menuEq=true;	
								}
							}
						}
						
					}
					echo $this->stopMenuitem;
					echo $this->stopMenu;
				}
			};
		}





		return "
					
				";

	}
	
}
