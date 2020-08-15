<?php

namespace app\controllers;

use app\models\Car;
use app\models\CarSearch;
use app\models\DriveType;
use app\models\EngineType;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
                'only' => ['logout'],
                'rules' => [
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $title = Car::getTitle($request);

        $query = Car::find()
            ->joinWith('model')
            ->joinWith('engineType')
            ->joinWith('driveType')
            ->joinWith('brand');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => array('pageSize' => 12),
        ]);

        $query->filterWhere(['car.id' => Yii::$app->request->get('id')]);

        $query->andFilterWhere([
            'model.model' => $request->get('model'),
            'brand.brand' => $request->get('brand'),
            'engine_type.engine' => $request->get('engine'),
            'drive_type.drive' => $request->get('drive'),
        ]);

        $engines = ArrayHelper::map(EngineType::find()->all(), 'engine', 'engine');
        $drives = ArrayHelper::map(DriveType::find()->all(), 'drive', 'drive');

        if($request->isAjax){
            $html = $this->renderPartial('ajax-content', [
                'dataProvider'=> $dataProvider
            ]);
            return Json::encode([
                'status' => 200,
                'html'=> $html,
            ]);
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'engines' => $engines,
            'drives' => $drives,
            'request' => $request,
            'title' => $title
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAjaxFilter(){

    }
}
