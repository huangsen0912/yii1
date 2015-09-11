<?php
/**
 * Created by PhpStorm.
 * User: spoplar
 * Date: 15-9-11
 * Time: 上午10:40
 */
class IndexController extends  Controller
{
    public $layout='//layouts/admin';
    public function  actionIndex(){
        $this->render("index");

    }

    public function  actionCopy(){
        $this->render("copy");
    }

}