<?php
class livrosController extends Controller {

	public function index() {
        $this->_page->view('livros/index');
	}
}