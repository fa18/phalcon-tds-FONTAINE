<?php

class productsController extends ControllerBase{



	public function indexAction(){
		$semantic = $this->jquery->semantic();
			//nom modele
		$client=Products::findFirst();
		$de=$semantic->dataElement("de4",$client);
		$de->setFields(["name","price"]);
		$de->setCaptions(["Nom : ","Prix :"]);
		echo $de;



	}

}