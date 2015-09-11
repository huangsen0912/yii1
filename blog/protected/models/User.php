<?php

/**
 * Created by PhpStorm.
 * User: spoplar
 * Date: 15-9-10
 * Time: 下午4:51
 */
class User extends  CActiveRecord
{
    public $password1;
    public $password2;
    /**
     * 必不可少，返回模型
     * @param string $className
     * @return 模型
     */
    public static function model($className=__CLASS__){
        return parent::model($className);
    }


    public function  tableName(){
        return "{{admin}}";
    }
    public function  attributeLables(){

        return array(
                'password' => '原始密码',
                'password1'=>'新密码',
                'password2'=>'确认密码'

        );

    }

    /**
     * 数据验证规则
     */
    public  function  rules(){
        return array(
            array('password',"required",'message'=>'原始密码不能为空'),
            array('password1',"required","message"=>"新密码不能为空"),
            array('password2',"required","message"=>"确认密码不能为空"),
            array('password2',"compare","compareAttribute"=>"password1",'message'=>"两个密码不相同"),

            array('password',"check_passwd"),

        );
    }

    public function check_passwd(){
        $username = Yii::app()->user->name;
        $userinfo = $this->find('username=:name',array(':name'=>$username));

        if($userinfo['password']!=md5($this->password)){
            $this->addError("password","原始密码不正确");
        }

    }

}