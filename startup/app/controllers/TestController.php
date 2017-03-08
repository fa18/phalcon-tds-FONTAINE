<?php
//@var Ajax\Semantic
//@property Ajax\JsUtils $jquery
class TestController extends ControllerBase{
	protected $semantic;

	public function initialize(){
		$this->semantic=$this->jquery->semantic();
	}

	public function indexAction(){
		
	}

	public function hideShowAction(){
		//$semantic = $this->jquery->semantic();	

		$ck= $this->semantic->htmlCheckbox("ckShowHide","Afficher/Masquer");
		$message=$this->semantic->htmlMessage("zone");
		$ck->on("change",$message->jsToggle("$(this).prop('checked')"));
		$ck->setChecked(true);

		$this->jquery->compile($this->view);
	}



	//mouse over
	public function changeCssAction(){
		$button1=$this->semantic->htmlButton("buttonPage1","page 1");
		$button2=$this->semantic->htmlButton("buttonPage2","page 2");
		
		$button1->getOn("mouseover","test/page1Desc","#pageDescA");
		$button2->getOn("mouseover","test/page2Desc","#pageDescA");

		$button1->on("mouseout",$this->jquery->html("#pageDescA",""));
		$button2->getOn("mouseout","test/pageVide","#pageDescA"); //version couteuse

		$button1->getOnClick("test/page1","#pageContent"); 
		$button1->getOnClick("test/page1Desc","#pageDesc");
		$button2->getOnClick("test/page2","#pageContent");
		$button2->getOnClick("test/page2Desc","#pageDesc");

		$message=$this->semantic->htmlMessage("pageContent");

		$this->jquery->compile($this->view);
	}

	public function page1Action(){
		echo "Titre page 1\n";
	}	

	public function page1DescAction(){
		echo "description de la page 1\n";
	}

	public function page2Action(){
		echo "Titre de la page 2\n";
	}

	public function page2DescAction(){
		echo "description de la page 2\n";
	}

	//pour version couteuse
	public function pageVideAction(){
		echo "";
	}


	public function getCascadeAction(){
			$semantic=$this->jquery->semantic();
			$bt=$semantic->htmlButton("btLoad","Chargement");
							//on recupere le contenu de page 3 et on le met dans le conteneur d'id	page3
			$bt->getOnClick("test/page3","#page3");
			echo $bt;
			echo "<div id='page3' style='border-style: solid; border-color:red'></div>";
			echo $this->jquery->compile($this->view);
	}

	public function page3Action(){
        $this->view->disable();
        echo "contenu de page 3";
        
        echo "<div id='page4' style='border-style: solid; border-color:green'>aa</div>";
        $this->jquery->get("test/page4","#page4");
        echo $this->jquery->compile();
    }

    public function page4Action(){
        $this->view->disable();
        echo "contenu de page 4";
    }

    public function postFormAction(){
    	//collections form
		$form=$this->semantic->htmlForm("formUser");
        $form->addInput("nom","Nom")->setName("nom");
        $form->addInput("email","Email")->setName("email");
        $form->addSubmit("btValider","Valider");
        $form->submitOnClick("btValider","test/postReponse","#divReponse");

		//$this->jquery->get("test/postReponse","#postResponse");

		echo $form->compile($this->jquery);
		echo $this->jquery->compile($this->view);
		echo "<div id='divReponse'></div>";

    }

    public function postReponseAction(){
    	$this->view->disable();
    	echo "nom : ".$_POST['nom']."</br>"."email : ".$_POST['email']."</br>";
    }
}	
