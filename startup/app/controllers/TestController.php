<?php

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

	public function changeCssAction(){
		$button1=$this->semantic->htmlButton("buttonPage1","page 1");
		$button2=$this->semantic->htmlButton("buttonPage2","page 2");
		
		$button1->getOnClick("test/page1","#pageContent");
		$button2->getOnClick("test/page2","#pageContent");

		$message=$this->semantic->htmlMessage("pageContent");

		$this->jquery->compile($this->view);
	}	
}	
