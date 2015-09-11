<?php

/**
 * Created by PhpStorm.
 * User: spoplar
 * Date: 15-9-11
 * Time: 上午11:23
 */
class UserController extends Controller
{
    /**
     * 修改密码
     */
    public function  actionIndex(){
        $this->render('index');
    }
    public  function  actionPasswd(){

        $userModel = User::model();
        if(isset($_POST['User']) && !empty($_POST['User'])){
            $userInfo = $userModel->find("username=:name",array(":name"=>Yii::app()->user->name));
            $userModel->attributes=$_POST['User'];
            if($userModel->validate()){
                $password = md5($_POST['User']['password']);
                if($tag=$userModel->updateByPk($userInfo->uid,array("password"=>md5($_POST["User"]['password1'])))){
                   Yii::app()->user->setFlash("success","修改密码成功");
                }

            }
        }

        $this->render('index',array('userModel'=>$userModel));
    }

}