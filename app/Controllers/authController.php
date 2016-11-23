<?php
class authController extends Controller {

    private function login() {
        $usuarios = new UsuariosTable();
        $user = $usuarios->getByLogin($_POST['email'], $_POST['senha']);
        if ($user) {
            $_SESSION['email'] = $this->getPost('email');
            $_SESSION['senha'] = $this->getPost('senha');
            $this->redirect("./home");
        }
        else {
            throw new Exception("Usuário ou senha inválidos");
        }
    }

    private function registro() {

    }

	public function index() {

        $erro = ['login' => 'Mensagem de erro login (tmp)', 'registro' => 'Mensagem de erro registro (tmp)'];
	    if($this->isPost()) {
	        if($this->getPost('action') == "login") {
                try {
                    $this->login();
                } catch (Exception $e) {
                    $erro['login'] = $e->getMessage();
                }
            }
            else if($this->getPost('action') == "registro") {
                try {
                    $this->registro();
                } catch(Exception $e) {
                    $erro['registro'] = $e->getMessage();
                }
            }
        }
        $this->_page->view("auth/index", compact('erro'));
    }

    public function logout() {
        session_destroy();
        $this->redirect("./home");
    }

    public function conta() {
        $this->_page->view('auth/conta');
    }
}