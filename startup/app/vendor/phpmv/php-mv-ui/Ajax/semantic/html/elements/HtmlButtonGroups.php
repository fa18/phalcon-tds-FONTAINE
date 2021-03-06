<?php

namespace Ajax\semantic\html\elements;

use Ajax\semantic\html\base\HtmlSemDoubleElement;
use Ajax\semantic\html\base\HtmlSemCollection;
use Ajax\JsUtils;

/**
 * Semantic UI Buttongroups component
 * @see http://semantic-ui.com/elements/button.html
 * @author jc
 * @version 1.001
 */
class HtmlButtonGroups extends HtmlSemCollection {

	public function __construct($identifier, $elements=array(), $asIcons=false) {
		parent::__construct($identifier, "div", "ui buttons");
		if ($asIcons === true)
			$this->asIcons();
		$this->addElements($elements, $asIcons);
	}
	protected function createItem($value){
		return new HtmlButton("", $value);
	}


	public function addElement($element, $asIcon=false) {
		$item=$this->addItem($element);
		if($asIcon)
			$item->asIcon($element);
		return $item;
	}

	public function addElements($elements, $asIcons=false) {
		foreach ( $elements as $element ) {
			$this->addElement($element, $asIcons);
		}
		return $this;
	}

	public function insertOr($aferIndex=0, $or="or") {
		$orElement=new HtmlSemDoubleElement("", "div", "or");
		$orElement->setProperty("data-text", $or);
		array_splice($this->content, $aferIndex + 1, 0, array ($orElement ));
		return $this;
	}

	/*
	 * (non-PHPdoc)
	 * @see \Ajax\bootstrap\html\HtmlSingleElement::fromArray()
	 */
	public function fromArray($array) {
		$this->addElements($array);
	}

	public function asIcons() {
		foreach ( $this->content as $item ) {
			if($item instanceof HtmlButton)
			$item->asIcon($item->getContent());
		}
		return $this->addToProperty("class", "icons");
	}

	public function setVertical() {
		return $this->addToProperty("class", "vertical");
	}

	public function setLabeled() {
		return $this->addToProperty("class", "labeled icon");
	}

	/**
	 * Return the element at index
	 * @param int $index
	 * @return HtmlButton
	 */
	public function getElement($index) {
		return $this->getItem($index);
	}

	public function setElement($index, $button) {
		$this->setItem($index, $button);
		return $this;
	}

	/*
	 * (non-PHPdoc)
	 * @see \Ajax\bootstrap\html\base\BaseHtml::on()
	 */
	public function on($event, $jsCode, $stopPropagation=false, $preventDefault=false) {
		foreach ( $this->content as $element ) {
			$element->on($event, $jsCode, $stopPropagation, $preventDefault);
		}
		return $this;
	}

	public function getElements() {
		return $this->content;
	}

	public function addClasses($classes=array()) {
		$i=0;
		if(!\is_array($classes)){
			$classes=array_fill (0,$this->count(),$classes);
		}
		foreach ( $this->content as $button ) {
			$button->addToProperty("class", $classes[$i++]);
		}
		return $this;
	}

	/*
	 * (non-PHPdoc)
	 * @see \Ajax\bootstrap\html\base\BaseHtml::fromDatabaseObject()
	 */
	public function fromDatabaseObject($object, $function) {
		$this->addElement($function($object));
	}

	public function run(JsUtils $js){
		$result= parent::run($js);
		return $result->setItemSelector(".ui.button");
	}
}