<?php
class searchController extends Controller {

	public function index() {
	    $search = htmlentities(urlencode($this->getPost('search')));
        $this->redirect("search/{$this->getPost('tipo')}/{$search}");
    }

    public function livro() {

        $livrosTable = new LivrosTable();
        $pesquisa = urldecode($this->getParam(0));
        $livros = $livrosTable->findByTitulo( $pesquisa );

        $this->search("livros", $pesquisa, $livros);
    }

    public function autor() {

        $livrosTable = new LivrosTable();
        $pesquisa = urldecode($this->getParam(0));
        $livros = $livrosTable->findByAutor( $pesquisa );

        $this->search("autor", $pesquisa, $livros);
    }

    public function editora() {

        $livrosTable = new LivrosTable();
        $pesquisa = urldecode($this->getParam(0));
        $livros = $livrosTable->findByEditora( $pesquisa );

        $this->search("editora", $pesquisa, $livros);
    }

    private function search($tipo, $pesquisa, $livros) {

        $titulo = "Mostrando livros que correspondem à pesquisa por {$tipo}: <i>'{$pesquisa}'</i>";
        $this->_page->view('index', compact('livros', 'titulo'));
    }
}