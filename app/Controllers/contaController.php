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

        $ut = new UsuariosTable();
        $usuario = $this->_page->usuario;

        //Se enviou algo
        if($this->isPost()) {
            $usuario->setAll( $_POST );

            $ut->setUsuario( $usuario );
            $ut->update();
        }
        $this->_page->view('conta/index', compact('usuario'));
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