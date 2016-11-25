<?php
class contaController extends Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->_page->usuario) {
            $this->redirect("erro/e401");
        }
    }

    public function index() {
        $this->_page->view('conta/index');
    }

    public function pedidos() {

        $vt = new VendasTable();

        $pedido_id = $this->getParam(0);

        if($pedido_id) {
            $pedido = $vt->getById($pedido_id);
            $this->_page->view('conta/pedidos/detalhes', compact('pedido'));
        }
        else {
            $pedidos = $vt->getByUsuario($this->_page->usuario->getId());

            $this->_page->view('conta/pedidos/view', compact('pedidos'));
        }
    }
}