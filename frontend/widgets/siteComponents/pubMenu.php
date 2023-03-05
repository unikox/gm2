<?php

namespace frontend\widgets\siteComponents;

use yii\base\Widget;


class pubMenu extends Widget
{

    public $name;
    public $sections;
    public $subsections;
    public $sectionsAlone;
    private $res = '';
    private $start = '';
    private $startMenu = '';
    private $bodyMenu = '';
    private $stopMenu = '';
    private $startMenuitem = '';
    private $preBodyMenuItem = '';
    private $bodyMenuItem = '';
    private $stopMenuitem = '';
    private $preStopMenuitem = '';
    private $menuItemId = 0;
    private $menuItemUrlId = 0;
    private $menuEq = false;
    private $menuItemHeader = 0;

    private $gpost;

    public function init()
    {
        parent::init();

        if ($this->name === null) {
            $this->name = 'безимянный раздел';
        }

        if ($this->sections === null) {
            $this->sections = 'безимянный раздел';
        }
        if ($this->subsections === null) {
            $this->subsections = 'без позиции';
        }

        $this->start = "<ul class='nav menu-mainmenu'> ";
        $this->startMenu = " <li>
									<a href='#group_menu";
        $this->bodyMenu = "' class='accordion-toggle collapsed'  data-toggle='collapse'>ZZZXZ";
        $this->stopMenu = "</a></li>";
        $this->startMenuitem = "<div id='group_menu";
        $this->preBodyMenuItem = "' class='panel-collapse collapse'><ul>";
        $this->bodyMenuItem = "<li><a href='/info_add/platezhnye_rekvizity'>";
        $this->preStopMenuitem = "</a></li>";
        $this->stopMenuitem = "</ul></div>";
        $this->menuItemHeader = 0;
        $this->menuItemId = "";
        $this->menuItemUrlId = 1;

    }

    public function run()
    {
        $this->res .= '<ul class="nav menu-mainmenu">';
        foreach ($this->sections as $key => $variable) {
            foreach ($variable as $key => $value) {
                if ($key == "id") {
                    $this->menuItemId = $value;
                }
                if ($key == "name") {

                    $this->res .= '<li>';
                    if ($this->menuItemHeader != $this->menuItemId) {
                        if ($value == "Главная") {
                            $this->res .= '<a  href="/" class="menuitem">' . $value . "</a>";

                        } elseif ($value == "Новости") {
                            $this->res .= '<a href="/news" class="menuitem">' . $value . "</a>";
                        } else {
                            $this->res .= '<a href="#group_menu' . $this->menuItemId . '" class="accordion-toggle collapsed menu-collapsed"  data-toggle="collapse">' . $value . '</a>';
                        }
                        $this->res .= '<div id="group_menu' . $this->menuItemId . '" class="panel-collapse collapse"><ul>';
                        $this->menuItemHeader = $this->menuItemId;
                    }
                    foreach ($this->subsections as $subsectionskey => $subsectionsvalue) {
                        foreach ($subsectionsvalue as $subsectkey => $subsectvalue) {
                            if ($subsectkey == "id" and !$this->menuEq) {
                                $this->menuItemUrlId = (int)$subsectvalue;
                            }
                            if ($subsectkey == "name" and $this->menuEq) {
                                $this->res .= '<li>';
                                $this->res .= '<a  href="/page/' . $this->menuItemUrlId . '">' . $subsectvalue . '</a>';
                                $this->res .= '</li>';
                                $this->menuEq = false;
                            }
                            if ($subsectkey == 'menuitem_id') {
                                if ((int)$subsectvalue == $this->menuItemId) {
                                    $this->menuEq = true;
                                }
                            }
                        }
                    }
                    $this->res .= "         </ul>";
                    $this->res .= "     </div>";
                    $this->res .= "</li>";
                }
            };
        }
        foreach ($this->sectionsAlone as $SectionItem){
            //var_dump($SectionItem);
            $this->res .= '<li>';
            $this->res .= '<a  href="/page/' . $SectionItem['id'] . '" class="menuitem" >' . $SectionItem['name'] . '</a>';
            $this->res .= '</li>';
        }
        $this->res .= "</ul>";
        return $this->res;
    }
}
