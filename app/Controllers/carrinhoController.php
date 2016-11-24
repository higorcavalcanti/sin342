<?php
class carrinhoController extends Controller {

	public function index() {

	    $lt = new LivrosTable();

	    $car = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];
        $carrinho = [];

        foreach($car as $id => $qnt) {
            $p['livro'] = $lt->getById($id);
            $p['quantidade'] = $qnt;
            $carrinho[] = $p;
        }

        $this->_page->view('carrinho/index', compact('carrinho'));
	}

	public function add() {

        $lt = new LivrosTable();

	    @$livro_id = $this->getParam(0);
	    @$_SESSION['carrinho'][$livro_id]++;

        $livro = $lt->getById($livro_id);

        $this->_page->view('carrinho/add', compact('livro'));
    }

    public function remove() {

        $lt = new LivrosTable();

        @$livro_id = $this->getParam(0);
        unset($_SESSION['carrinho'][$livro_id]);

        $livro = $lt->getById($livro_id);

        $this->_page->view('carrinho/remove', compact('livro'));
    }
}