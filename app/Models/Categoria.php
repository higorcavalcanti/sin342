<?php
class Categoria extends Model {

    protected $id;
    protected $nome;

    public function __construct($obj = array()) {
        $this->setAll($obj);
    }

    /**
     * Obtem uma lista de livros que pertencem à esta categoria
     * @return array|mixed Lista de livros pertencentes
     */
    public function getLivros() {
        $l = new LivrosTable();
        return $l->getByCategoria( $this->getId() );
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
}