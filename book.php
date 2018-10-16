<?php

class Book {
	//property title
	private $title;  

	//property writer
	public $writer;

	public function setTitle($arg) {
		$this->title = $arg;
	}

	public function getTitle() {
		return $this->title;
	}
	
}
