<?php
class VendaItensTable extends Table {

    public function __construct()
    {
        parent::__construct("venda_itens", VendaItem::class);
    }

    /**
     * Obtem a VendaItens que está sendo manipulada
     * @return mixed
     */
    public function getVendaItem() {
        return $this->getObject();
    }

    /**
     * Define a VendaItens que está sendo manipulada
     * @param $obj VendaItem a ser manipulada
     */
    public function setVendaItem($obj) {
        $this->setObject($obj);
    }


    /**
     * Obtem todos as compras de um usuário
     * @param $id int Id do Usuário a ser pesquisado
     * @return array|mixed
     */
    public function getByVenda($id) {
        return parent::get(null,"venda_id=?",[$id],null);
    }
}