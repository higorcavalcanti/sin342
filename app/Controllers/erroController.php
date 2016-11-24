<?php
class erroController extends Controller {

	public function index() {
	    $this->_page->view("erro/index");
    }

	public function e401(){
        $this->_page->view('erro/401');
	}

    public function e404(){
        $this->_page->view('erro/404');
    }
}