<?php
class authController extends Controller {

    private function login() {
        $usuarios = new UsuariosTable();
        $user = $usuarios->getByLogin($_POST['email'], $_POST['senha']);
        if ($user) {
            $_SESSION['email'] = $this->getPost('email');
            $_SESSION['senha'] = $this->getPost('senha');
            $this->redirect("home");
        }
        else {
            throw new Exception("Usuário ou senha inválidos");
        }
    }

    private function registro() {
        $usuarios = new UsuariosTable();
        $user = [
            'email' => $this->getPost('email'),
            'senha' => $this->getPost('senha'),
            'nome' => $this->getPost('nome'),
            'role' => 'user'
        ];
        if( strlen( $user['email'] ) < 3 || strlen( $user['email'] ) > 100 ) {
            throw new Exception("O seu email deve ter entre 3 e 100 caracteres!");
        }
        if( strlen( $user['senha'] ) < 3 || strlen( $user['senha'] ) > 32 ) {
            throw new Exception("A senha deve ter entre 3 e 32 caracteres!");
        }
        if( strlen( $user['nome'] ) < 3  || strlen( $user['nome'] ) > 150) {
            throw new Exception("O seu nome deve ter entre 3 e 150 caracteres!");
        }
        if($usuarios->getByEmail( $user['email'] )) {
            throw new Exception("Já existe um usuário com esse Email!");
        }

        $user = new Usuario($user);
        $usuarios->setUsuario( $user );

        if(!$usuarios->insert()) {
            throw new Exception("Erro inesperado!");
        }
        return $this->login();
    }

	public function index() {

	    $usuarios = new UsuariosTable();
        if($usuarios->getBySession()) {
            $this->redirect('home');
        }

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
        $this->redirect("home");
    }

    public function conta() {
        $this->_page->view('auth/conta');
    }
}