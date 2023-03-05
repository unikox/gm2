<?php

namespace frontend\controllers;

use app\models\News;
use app\models\NewsSearch;
use app\models\Pages;
use common\models\LoginForm;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\helpers\Url;

/**
 * Site controller.
 */
class SiteController extends Controller
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
        
	xhprof_enable(XHPROF_FLAGS_CPU + XHPROF_FLAGS_MEMORY);


        $news_page_res = Pages::getCovid();
        if (!isset($news_page_res)) {
            $news_page_res = [];
        }
        $news_list = News::getListNews();
        return $this->render('index', [
            'covid_data' => $news_page_res,
            'news_list' => $news_list
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
