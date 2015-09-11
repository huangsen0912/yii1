<?php

/**
 * Created by PhpStorm.
 * User: spoplar
 * Date: 15-9-11
 * Time: 下午2:48
 */
class CategoryController extends  Controller
{
    public  function  actionIndex(){
        $categoryModel=Category::model();
        //$articleInfo=$categoryModel->findAll();
        $sql = "SELECT cid,cname FROM {{category}}";
        $categoryInfo = $categoryModel->findAllBySql($sql);
        //var_dump($categoryInfo);die;
        $this->render("index",array('categoryInfo'=>$categoryInfo));

    }

    public  function  actionAdd(){
        $categoryModel = new Category();
        if(isset($_POST['Category']) && !empty($_POST['Category'])){
            $categoryModel->attributes=$_POST["Category"];
            if($categoryModel->save()){
                $this->redirect(array("index"));

            }
        }

        $this->render('add',array('categoryModel'=>$categoryModel));
    }

    public function  actionEdit($cid){
        $categoryModel = Category::model();
        //if(isset($_GET['cid']) && !empty($_GET['cid'])){
           $categoryInfo=$categoryModel->findByPk($cid);
       // }

        if(isset($_POST['Category']) && !empty($_POST['Category'])){

            $categoryInfo->attributes=$_POST["Category"];
            if($categoryInfo->save()){
                Yii::app()->user->setFlash("success","修改栏目成功");
            }

        }

        $this->render("edit",array("categoryModel"=>$categoryInfo));
    }

    public function  actionDel($cid){

       $articleModel= Article::model();

        $sql = "SELECT aid FROM {{article}} where cid=$cid";
        $articleInfo=$articleModel->findAllBySql($sql);
        if(is_object($articleInfo)){
            Yii::app()->user->setFlash("hasArt","栏目下面有文章，请先删除文章");

        }else{
            if(Category::model()->deleteByPk($cid)){
                $this->redirect(array('index'));
            }
        }
    }

}