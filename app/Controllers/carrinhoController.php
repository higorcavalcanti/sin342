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

    public function finalizar() {

        if(!$this->_page->usuario) {
            $this->redirect("erro/e401");
        }

        $vt = new VendasTable();
        $vit = new VendaItensTable();

        $venda = new Venda();
        $venda->setData( date('Y-m-d H:i:s') );
        $venda->setUsuarioId( $this->_page->usuario->getId() );

        $vt->setVenda($venda);
        $vt->insert();

        $carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : [];

        foreach($carrinho as $id => $qnt) {
            $item = new VendaItem();
            $item->setLivroId( $id );
            $item->setQuantidade( $qnt );
            $item->setVendaId( $venda->getId() );

            $vit->setVendaItem( $item );
            $vit->insert();
        }
        unset($_SESSION['carrinho']);

        $this->_page->view('carrinho/finalizar');
    }
}