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


    public function getBySession() {
        return parent::get(null, "email = ? AND senha = ?", ['admin@admin.com', 'admin'], null);
    }
}