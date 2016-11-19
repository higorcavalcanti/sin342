<?php
class homeController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
        $this->_page->view('index');

        $livros = new LivrosTable();

        $livro = $livros->getById(1);

        echo "<pre>";
        var_dump( $livro );
        echo "</pre>";
	}
}