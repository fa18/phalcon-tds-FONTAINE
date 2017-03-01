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
}	