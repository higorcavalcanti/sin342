<?php
class livrosController extends Controller {

	public function view() {

	    $lt = new LivrosTable();

        $livro_id = $this->getParam(0);

        $livro = $lt->getById( $livro_id );

        $this->_page->view('livros/view', compact('livro') );
	}
}