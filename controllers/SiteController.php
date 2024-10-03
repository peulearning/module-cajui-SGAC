<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Usuario;
use app\models\User;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
    // Verificar se o usuário já está logado
    if (Yii::$app->user->isGuest) {
        // Tentar logar o usuário baseado no cookie
        $userID = Yii::$app->request->cookies->getValue('userID');
        if ($userID) {
            $user = Usuario::findOne($userID); // Utilize o seu modelo de usuário aqui
            if ($user) {
                Yii::$app->user->login($user);
            }
        }
    }

    // Criar um DataProvider para a model Usuario
    $dataProvider = new ActiveDataProvider([
        'query' => Usuario::find(), // Ajuste a consulta conforme necessário
        'pagination' => [
            'pageSize' => 10, // Número de registros por página
        ],
    ]);

    // Renderizar a view do índice e passar o DataProvider
    return $this->render('index', [
        'dataProvider' => $dataProvider, // Passa o DataProvider para a view
    ]);
}


    /**
     * Login action.
     *
     * @return Response|string
     */
    // public function actionLogin()
    // {
    //     $model = new LoginForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->login()) {
    //         $dataProvider = new \yii\data\ActiveDataProvider([
    //             'query' => Usuario::find()
    //                 ->joinWith(['curso']),
    //             'pagination' => [
    //                 'pageSize' => 20,
    //             ],
    //             'sort' => [
    //                 'defaultOrder' => [
    //                     'nome' => SORT_ASC,
    //                 ],
    //             ],
    //         ]);


    //         return $this->render('index', [
    //             'dataProvider' => $dataProvider,
    //         ]);
    //     }

    public function actionLogin()
{
    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
        // Criar um cookie
        $cookie = new \yii\web\Cookie([
            'name' => 'userID',
            'value' => $model->getUser()->id,
            'expire' => time() + 3600 * 24 * 30, // 30 dias
        ]);
        Yii::$app->response->cookies->add($cookie);

        return $this->redirect(['site/index']);
    }

    return $this->render('login', ['model' => $model]);

        if(!Yii::$app->user->isGuest){
            return $this->render('login',[
                'model'=> $model,
            ]);
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

        return $this->redirect(['site/login/']);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    //public function actionContact()
   // {
   //     $model = new ContactForm();
  //      if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
  //          Yii::$app->session->setFlash('contactFormSubmitted');

  //          return $this->refresh();
  //      }
  //      return $this->render('contact', [
  //          'model' => $model,
  //      ]);
  //  }

    /**
     * Displays about page.
     *
     * @return string
     */
 //   public function actionAbout()
//    {
 //       return $this->render('about');
 //   }
}