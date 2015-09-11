<?php

/**
 * Created by PhpStorm.
 * User: spoplar
 * Date: 15-9-11
 * Time: 下午4:13
 */
class Article extends  CActiveRecord
{
    public static function  model($className=__CLASS__){
        return parent::model($className);
    }

    public function tableName(){
        return "{{article}}";
    }

    public function  attributeLables(){
        return array(
            'title'=>"标题",
            'type'=>"类型",
            "cid" =>"栏目",
            "thumb"=>"缩略图",
            "info"=>"摘要",
            "content"=>"内容"

        );
    }

    public function  rules(){
        return array(
            array('title','required','message'=>"标题不能为空"),
            array('type','in','range'=>array(0,1),'message'=>'请选择类型'),
            array('cid','check_cate'),
            array('info','required'),
            array('thumb','file','types'=>'jpg,gif,png,jpeg','message'=>"类型不符合"),
            array('content','required','message'=>"内容必填"),

        );

    }
    public function  check_cate(){
        $cid = $this->cid;
        if($this->cid<=0){
            $this->addError("cid",'请选择栏目');
        }
    }

}