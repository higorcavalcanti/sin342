<?php
class homeController extends Controller {

    public function index() {

        $titulo = "Todos os livros";

        $livrosTable = new LivrosTable();
        $livros = $livrosTable->getAll();
        $this->_page->view('index', compact('livros', 'titulo'));
    }

	public function vendidos() {

        $titulo = "Livros mais vendidos";

	    $livrosTable = new LivrosTable();
        $livros = $livrosTable->getMaisVendidos(12);
        $this->_page->view('index', compact('livros', 'titulo'));
	}
}