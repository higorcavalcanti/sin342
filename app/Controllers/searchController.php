<?php
class searchController extends Controller {

	public function index() {
	    $search = htmlentities(urlencode($this->getPost('search')));
        $this->redirect("search/{$this->getPost('tipo')}/{$search}");
    }

    public function livro() {
        $this->search("livros");
    }

    public function autor() {
        $this->search("autor");
    }

    public function editora() {
        $this->search("editora");
    }

    private function search($title) {

        $tituloPesquisa = urldecode($this->getParam(0));

        $livrosTable = new LivrosTable();
        $livros = $livrosTable->findByTitulo( $tituloPesquisa );

        $title = "Mostrando livros que correspondem à pesquisa por {$title}: '{$tituloPesquisa}'";
        $this->_page->view('search/index', compact('livros', 'title'));
    }
}