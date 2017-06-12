<?php

namespace app\controllers;

use app\models\db\Post;
use app\models\User;
use app\models\forms\RegistrationForm;
use app\services\UserService;
use app\models\forms\PostForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{

    private
        $_userService;


    public function init()
    {
        $this->_userService = new UserService();
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout', 'delete-post'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'delete-post' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
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
        $query = Post::find()->joinWith(['user']);

        $provider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => ['id' => SORT_DESC],
            ],
        ]);

        $postForm = new PostForm();
        if ($postForm->load(Yii::$app->request->post()) && $postForm->validate()) {
            $post = new Post([
               'text' => $postForm->text,
                'user_id' => Yii::$app->user->id,
            ]);

            if ($post->save()) {
                Yii::$app->session->setFlash('posted');
                return $this->refresh();
            }
        }

        return $this->render('index', [
            'provider' => $provider,
            'postForm' => $postForm,
        ]);
    }

    public function actionRegistration()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegistrationForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            // TODO: add flash

            $isSuccess = $this->_userService->register(
                $model->username,
                $model->password,
                $model->email,
                $model->firstName,
                $model->lastName,
                $model->city_id
            );

            if ($isSuccess) {
                Yii::$app->session->addFlash('registration_successful');
                return $this->redirect(['/site/login']);
            }
        }
        return $this->render('registration', [
            'model' => $model,
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

    public function actionUserPosts($userId)
    {
        if ($user = User::findOne($userId)) {
            $query = Post::find(['user_id' => $userId]);

            $provider = new ActiveDataProvider([
                'query' => $query,
                'sort' => [
                    'defaultOrder' => ['id' => SORT_DESC],
                ],
            ]);

            return $this->render('user-posts', [
                'provider' => $provider,
                'user' => $user,
            ]);
        }

        throw new NotFoundHttpException();
    }

    public function actionDeletePost($id)
    {
        $post = Post::findOne($id);

        if ($post && $post->user_id === Yii::$app->user->id) {
                $post->delete();
        }

        return $this->goBack();
    }
}
