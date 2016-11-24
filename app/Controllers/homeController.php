<?php
class homeController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {

	    $livrosTable = new LivrosTable();
        $livros = $livrosTable->getMaisVendidos(12);

        if(!is_array($livros)) $livros = [$livros];

        $this->_page->view('index', compact('livros'));
	}
}