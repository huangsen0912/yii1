<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->renderPartial("index");
	}
	public function  actionCopy(){
		$this->render("copy");
	}
}