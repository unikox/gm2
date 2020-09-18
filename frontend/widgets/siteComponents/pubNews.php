<?php

namespace frontend\widgets\siteComponents;
use yii\base\Widget;


class pubNews extends Widget
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
    private $menuItemUrlId;
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
		$this->bodyMenu="' class='accordion-toggle collapsed'  data-toggle='collapse'>ZZZXZ";
		$this->stopMenu = "</a></li>";
		$this->startMenuitem = "<div id='group_menu";
		$this->preBodyMenuItem="' class='panel-collapse collapse'><ul>";
		$this->bodyMenuItem="<li><a href='/info_add/platezhnye_rekvizity'>";
		$this->preStopMenuitem = "</a></li>";
		$this->stopMenuitem = "</ul></div>";
		$this->menuItemHeader = 0;
		$this->menuItemId = "";
		$this->menuItemUrlId = 1;

	}
	public function run()
	{
		echo '<ul class="nav menu-mainmenu">' ;
		foreach ($this->sections as $key => $variable) {
			foreach ($variable as $key => $value) {
				if ($key == "id"){
					$this->menuItemId=$value;
				}
				if ($key == "name"){
					//echo "<h4>mItemStart</h4>";
					echo '<li>';
					if( $this->menuItemHeader != $this->menuItemId ){
					    if($value == "Главная"){
                            echo '<a class="accordion-toggle collapsed" href="index.php?r=site/index">' . $value ."</a>";
                        }
                        elseif($value == "Новости"){
                            echo '<a class="accordion-toggle collapsed" href="index.php?r=news">' . $value ."</a>";
                        }
                        else{
                            echo '<a href="#group_menu' . $this->menuItemId . '" class="accordion-toggle collapsed"  data-toggle="collapse">'. $value .'</a>';
                        }


						echo '<div id="group_menu' . $this->menuItemId . '" class="panel-collapse collapse"><ul>';

						$this->menuItemHeader = $this->menuItemId;
						//echo "menuItemId:".$this->menuItemId;						
					}

					foreach ($this->subsections as $subsectionskey => $subsectionsvalue) {

						foreach ($subsectionsvalue as $subsectkey => $subsectvalue) {
							//$this->menuItemUrlId = (int)$subsectvalue;
							if( $subsectkey == "id" and !$this->menuEq  ){
								$this->menuItemUrlId = (int)$subsectvalue;
								//echo "<h3>subsectvalue: " .  (int)$subsectvalue . "</h3>";
								//echo "<h3>menuItemUrlId: " .  (int)$this->menuItemUrlId . "</h3>";
								//var_dump($subsectkey);	
							}
							if( $subsectkey == "name" and $this->menuEq ){
									//echo "<h4>mSubItemStart</h4>";
									echo '<li>';
									echo '<a  href="index.php?r=pages%2Fview&id='. $this->menuItemUrlId . '">' .  $subsectvalue . '</a>';
									echo '</li>';
									//echo $subsectvalue;	
									//echo "<h4>mSubItemStop</h4>";
									$this->menuEq=false;

							}							
							if( $subsectkey == 'menuitem_id' ){
								if((int)$subsectvalue == $this->menuItemId){
									$this->menuEq=true;	
								}
							}
						}
						
					}
					echo 		"</ul>";
					echo 	"</div>";
					echo "</li>";
					//echo "<h4>mItemStop</h4>";
				}

			};
			//echo "</ul>" ;
		}
		echo "</ul>" ;
		return "
					
				";

	}
	
}
