<?php
class erroController extends Controller {

	public function index() {
	    $this->_page->view("erro/index");
    }

	public function e401(){
        header('HTTP/1.0 401 Unauthorized');
        $this->_page->view('erro/401');
	}

    public function e404(){
        header("HTTP/1.0 404 Not Found");
        $this->_page->view('erro/404');
    }
}