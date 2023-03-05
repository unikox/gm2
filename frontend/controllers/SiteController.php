<?php

namespace frontend\controllers;

use app\models\News;

use app\models\Pages;
use app\models\Hpage;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;


/**
 * Site controller.
 */
class SiteController extends MotherController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
<<<<<<< HEAD
        //Главная страница HomePage
=======
        
        $news_page_res = Pages::getCovid();
>>>>>>> af7ba71e5d0429e9cb6ba24a5f8c2a77742c8331
        if (!isset($news_page_res)) {
            $news_page_res = [];
        }
        $hueta = ['hui', 'pizda', 'jigura'];
        $news_page_res = Pages::getCovid();
        $hpage_body = Hpage::getBody();
        $news_list = News::getListNews();
        return $this->render('index', [
            'covid_data' => $news_page_res,
            'news_list' => $news_list,
            'hpage_body' => $hpage_body,
            'ebota' => $hueta
        ]);
    }

    public function actionSw()
    {
        
        $session = Yii::$app->session;
        $slow_view_mode = $session->get('slow_view_mode');
        //dd($slow_view_mode);
        if($slow_view_mode=='Enabled'){
            
            $session->set('slow_view_mode', 'Disabled');
            setcookie("Slow_view_mode", 'Disabled', time()+3600);
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }
        else {

            $session->set('slow_view_mode', 'Enabled');
            setcookie("Slow_view_mode", 'Enabled', time()+3600);
            return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }

    }

}
