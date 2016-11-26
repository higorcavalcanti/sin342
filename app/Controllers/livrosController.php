<?php
class livrosController extends Controller {

	public function view() {

	    $lt = new LivrosTable();

        $livro_id = $this->getParam(0);

        $livro = $lt->getById( $livro_id );

        $this->_page->view('livros/view', compact('livro') );
	}

    public function vendidos() {

        $titulo = "Conheca os livros mais vendidos";

        $livrosTable = new LivrosTable();
        $livros = $livrosTable->getMaisVendidos(12);
        $this->_page->view('index', compact('livros', 'titulo'));
    }
}