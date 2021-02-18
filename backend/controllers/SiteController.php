<?php

namespace backend\controllers;

use backend\models\UpdateUser;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
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
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'update'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * @return string
     * @throws \yii\base\Exception
     */
    public function actionUpdate()
    {

        $user = UpdateUser::findOne(Yii::$app->user->id);

        if ($user->load(Yii::$app->request->post())) {
            if ($user->validatePassword($user->password)) {
                if ($user->new_password == $user->repeat_new_password) {
                    if ($user->new_password)
                        $user->setPassword($user->new_password);
                    if ($user->save()) {
                        Yii::$app->session->setFlash('success', 'User data updated');
                        return $this->redirect(['site/update']);
                    }
                } else
                    $user->addError('repeat_new_password', 'Passwords are not identical');
            } else
                $user->addError('password', 'Incorrect password');
            Yii::$app->session->setFlash('error', implode(', ', array_column($user->errors, 0)));
        }

        return $this->render('update', [
            'user' => $user
        ]);
    }
}
