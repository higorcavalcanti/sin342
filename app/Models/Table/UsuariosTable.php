<?php
class UsuariosTable extends Table {

    public function __construct() {
        parent::__construct("usuarios", Usuario::class);
    }

    /**
     * Retorna o objeto sendo manipulado
     * @return mixed
     */
    public function getUsuario() {
        return $this->getObject();
    }

    /**
     * Define o usuário a ser manipulado
     * @param $user usuario manipulado
     */
    public function setUsuario($user) {
        $this->setObject($user);
    }

    public function getByEmail($email) {
        return parent::get(null, "email = ?", [$email], null);
    }

    public function getByLogin($user, $pass) {
        return parent::get(null, "email = ? AND senha = ?", [$user, $pass], null);
    }

    public function getBySession() {

        $email = isset($_SESSION['email']) ? $_SESSION['email'] : null;
        $senha = isset($_SESSION['senha']) ? $_SESSION['senha'] : null;

        return $this->getByLogin($email, $senha);
    }
}