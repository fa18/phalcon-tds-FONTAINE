<?php

class productsController extends ControllerBase{



	public function indexAction(){
		$semantic = $this->jquery->semantic();
			//nom modele

		$products=Products::find();
		$lv=$semantic->dataTable("lv1-1","Products",$products);
		$lv->setFields(["name","price","active"]);
		$lv->setCaptions(["Nom : ","Prix :","Actif :"]);
		$lv->getOnRow("click","sTest/show","#lv2-6-detail",["attr"=>"data-ajax","preventDefault"=>false,"stopPropagation"=>false]);
		//echo $lv;
	
		$this->jquery->compile($this->view);
	}

	public function showAction($id=1){
        $produit = Products::findFirst($id);
        echo "Nom : ".$produit->getName()."<br>";
        echo "Prix : ".$produit->getPrice()."$";
    }

}