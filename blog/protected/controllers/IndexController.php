<?php

/**
 * Created by PhpStorm.
 * User: spoplar
 * Date: 15-9-9
 * Time: 上午11:45
 */
class IndexController extends Controller
{
    public $layout="//layouts/blog";
   // public $layout='//layouts/column1';
    public function  actionIndex(){
        $data=array(
            'articleNew'=>array(),
            'articleHot'=>array(),
            'common'=>array(),

        );
        $this->render("index",$data);

    }

    public function  actionAdd(){
        $this->render("add");
    }
}