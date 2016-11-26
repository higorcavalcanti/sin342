<?php
class homeController extends Controller {

    public function index() {

        $titulo = "Todos os livros";

        $livrosTable = new LivrosTable();
        $livros = $livrosTable->getAll();
        $this->_page->view('index', compact('livros', 'titulo'));
    }
}