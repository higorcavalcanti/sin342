<?php
class CategoriasTable extends Table {

    public function __construct()
    {
        parent::__construct("categorias", Categoria::class);
    }

    /**
     * Obtem a categoria que está sendo manipulada
     * @return mixed
     */
    public function getCategoria() {
        return $this->getObject();
    }

    /**
     * Define a categoria que está sendo manipulada
     * @param $cat Categoria a ser manipulada
     */
    public function setCategoria($categoria) {
        $this->setObject($categoria);
    }
}