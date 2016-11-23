<?php
class livrosController extends Controller {

	public function view() {

	    $livros = new LivrosTable();
        $livro = $livros->getById(1);

        $this->_page->view('livros/view', compact('livro') );
	}
}