<?php
class searchController extends Controller{

	public function index() {
	    $this->_page->view("erro/index");
    }

	public function e404(){
        $this->_page->view('erro/404');
	}
}