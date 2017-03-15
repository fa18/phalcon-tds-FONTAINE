<?php

class productsController extends ControllerBase{



	public function indexAction(){
		$semantic = $this->jquery->semantic();
			//nom modele

		$products=Products::find();
		$lv=$semantic->dataTable("lv1-1","Products",$products);
		$lv->setFields(["name","price"]);
		$lv->setCaptions(["Nom : ","Prix :"]);
		echo $lv;
	

	}

}