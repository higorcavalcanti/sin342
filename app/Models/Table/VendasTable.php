<?php
class VendasTable extends Table {

    public function __construct()
    {
        parent::__construct("vendas", Venda::class);
    }

    /**
     * Obtem a venda que está sendo manipulada
     * @return mixed
     */
    public function getVenda() {
        return $this->getObject();
    }

    /**
     * Define a venda que está sendo manipulada
     * @param $obj Venda a ser manipulada
     */
    public function setVenda($obj) {
        $this->setObject($obj);
    }


    /**
     * Obtem todos as compras de um usuário
     * @param $id int Id do Usuário a ser pesquisado
     * @return array|mixed
     */
    public function getByUsuario($id) {
        return parent::get(null,"usuario_id=?",[$id],null);
    }
}