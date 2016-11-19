<?php
class erroController extends Controller{
	public function __construct(){
		parent::__construct();
	}

	public function index() {
	    $this->_page->view("erro/index");
    }

	public function e404(){
        $this->_page->view('erro/404');
	}
}