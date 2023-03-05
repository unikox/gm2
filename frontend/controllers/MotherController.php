<?php

namespace frontend\controllers;

use yii\web\Controller;
use app\models\Menuitems;
use app\models\Slider;
use app\models\Template;


class MotherController extends Controller{
    
    
    public function init()
    {
        parent::init();
        $this->view->params['menu_items'] = [
            'sections' => Menuitems::getSections(),
            'subsections' => Menuitems::getSubSections(),
            'sectionsAlone' => Menuitems::getSubSectionsAlone(),
        ];

        $this->view->params['slider'] = Slider::getItems('General');
        $this->view->params['header'] = Template::getHeader();
        $this->view->params['footer'] = Template::getFooter();
 

    }
} 