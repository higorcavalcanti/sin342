<?php
class AtendimentosTable extends Table {

    public function __construct()
    {
        parent::__construct("atendimentos", Atendimento::class);
    }

    /**
     * Obtem o atendimento que está sendo manipulada
     * @return mixed
     */
    public function getAtendimento() {
        return $this->getObject();
    }

    /**
     * Define o atendimento que está sendo manipulada
     * @param $editora Editora a ser manipulada
     */
    public function setAtendimento($obj) {
        $this->setObject($obj);
    }
}