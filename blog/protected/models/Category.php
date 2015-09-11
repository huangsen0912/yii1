<?php

/**
 * Created by PhpStorm.
 * User: spoplar
 * Date: 15-9-11
 * Time: 下午2:56
 */
class Category extends CActiveRecord
{
    public static function model($className=__CLASS__){
        return parent::model($className);
    }


    public  function  tableName(){
        return  "{{category}}";
    }

    public function attributeLables(){
        return array(
                "cname"=>"栏目名称"
        );

    }

    public function rules(){

        return array(
            array("cname","required","message"=>"栏目名称不能为空"),

            array("cname","length","min"=>2,"max"=>10,"message"=>"长度不能超过10个字符")

        );

    }

}