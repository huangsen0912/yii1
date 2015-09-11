<?php

/**
 * Created by PhpStorm.
 * User: spoplar
 * Date: 15-9-11
 * Time: 下午4:12
 */
class ArticleController extends  Controller
{
    public function  actionIndex(){
        $article=Article::model();
        $this->render("index",array('article',array('articleModel'=>$article)));
    }

    public  function  actionAdd(){
        $articleModel=new Article();
        if(isset($_POST['Article']) && !empty($_POST['Article'])){
            $articleModel->attributes =$_POST["Article"];
            if($articleModel->save()){
                $this->redirect(array('index'));
            }
        }

        $categoryModel=Category::model();
        $categoryInfo = $categoryModel->findAll();
        $cateArr = array();
        $cateArr[] ="请选择";
        foreach($categoryInfo as $v){
            $cateArr[$v->cid]=$v->cname;
        }

        $this->render("add",array('articleModel'=>$articleModel,'cateArr'=>$cateArr));
    }
}