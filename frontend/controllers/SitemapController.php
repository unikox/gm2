<?php

namespace frontend\controllers;

use Yii;
use app\models\Pages;
use app\models\PagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Sitemap;
/**
 * PagesController implements the CRUD actions for Pages model.
 */
class SitemapController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pages models.
     * @return mixed
     */
    public function actionIndex()
    {

        $sitemap = new Sitemap();
        $XMLres = $sitemap->getSiteMap();
        return $XMLres;

    }

}