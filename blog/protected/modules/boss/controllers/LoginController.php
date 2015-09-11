<?php

/**
 * Created by PhpStorm.
 * User: spoplar
 * Date: 15-9-10
 * Time: 下午2:24
 */
class LoginController extends Controller
{
    public $layout="//loyouts/admin";
    public function  actionIndex(){
        //var_dump(Yii::app()->db);

        //$info=User::model()->find('username=:name',array(':name'=>"admin"));


        $loginForm= new LoginForm();


        //var_dump($info);die;
        if(isset($_POST['LoginForm'])) {
            $loginForm->attributes=$_POST['LoginForm'];
            if ($loginForm->validate() && $loginForm->login()) {
                Yii::app()->session['logintime']=time();
                $this->redirect(array('index/index'));
            }
        }
        $this->render("index",array('loginForm'=>$loginForm));


    }

    public function actionOut(){
        Yii::app()->user->logout();

    }
    public function actions(){

        return array(
            'captcha'=>array(
                'class' =>'system.web.widgets.captcha.CCaptchaAction',
                'height'=>25,
                'width'=>80,
                'minLength'=>4,
                'maxLength'=>4

            ),

        );

    }
}