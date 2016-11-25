<?php
class Livro extends Model {

    protected $id;
    protected $titulo;
    protected $autor;
    protected $preco;
    protected $categoria_id;
    protected $editora_id;
    protected $image_id;

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
     * Retorna a editora (Objeto) do livro atual
     * @return array|mixed Editora
     */
    public function getEditora() {
        $e = new EditorasTable();
        return $e->getById( $this->getEditoraId() );
    }

    /**
     * Retorna a imagem (Objeto) do livro atual
     * @return array|mixed Image
     */
    public function getImage() {
        $i = new ImagesTable();
        return $i->getById( $this->getImageId() );
    }

    /**
     * Obtem o código HTML para mostrar a capa do livro
     * @return string
     */
    public function image($thumb = false) {
        $class = $thumb == true ? 'livro-img-thumb' : 'livro-img';
        return "<img src='image/view/{$this->getImageId()}' class='{$class}'/>";
    }

    /**
     * Obtem o código HTML para mostrar a capa do livro com link
     * @return string
     */
    public function imageLink($thumb = false) {
        return "<a href='livros/view/{$this->getId()}'>".$this->image($thumb)."</a>";
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
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @param mixed $preco
     */
    public function setPreco($preco)
    {
        $this->preco = $preco;
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

    /**
     * @return mixed
     */
    public function getEditoraId()
    {
        return $this->editora_id;
    }

    /**
     * @param mixed $editora_id
     */
    public function setEditoraId($editora_id)
    {
        $this->editora_id = $editora_id;
    }

    /**
     * @return mixed
     */
    public function getImageId()
    {
        return $this->image_id;
    }

    /**
     * @param mixed $image_id
     */
    public function setImageId($image_id)
    {
        $this->image_id = $image_id;
    }

}