<?php
class Livro extends Model {

    protected $id;
    protected $titulo;
    protected $autor;
    protected $categoria_id;

    public function __construct($obj = array()) {
        $this->setAll($obj);
    }

    /**
     * Retorna a categoria (Objeto) do livro atual
     * @return array|mixed Categoria
     */
    public function getCategoria() {
        $c = new CategoriasTable();
        return $c->getById( $this->getCategoriaId() );
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
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoria_id;
    }/**
     * @param mixed $categoria_id
     */
    public function setCategoriaId($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }


}