<?php
class authController extends Controller {

    public function index() {}

	public function login() {

        $usuarios = new UsuariosTable();

	    if($this->isPost()) {
            $user = $usuarios->getByLogin($_POST['email'], $_POST['senha']);
            if($user) {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['senha'] = $_POST['senha'];
            }
        }
        else {
            $this->_page->view("auth/login");
        }
    }

    public function conta() {
        $this->_page->view('auth/conta');
    }
}