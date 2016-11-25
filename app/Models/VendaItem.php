<?php
class VendaItem extends Model {

    protected $id;
    protected $venda_id;
    protected $livro_id;
    protected $quantidade;

    public function __construct($obj = array()) {
        $this->setAll($obj);
    }

    /**
     * Retorna a venda (Objeto) do item atual
     * @return Venda
     */
    public function getVenda() {
        $vt = new VendasTable();
        return $vt->getById( $this->getVendaId() );
    }

    /**
     * Retorna o livro (Objeto) do item atual
     * @return Livro
     */
    public function getLivro() {
        $lt = new LivrosTable();
        return $lt->getById( $this->getLivroId() );
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
    public function getVendaId()
    {
        return $this->venda_id;
    }

    /**
     * @param mixed $venda_id
     */
    public function setVendaId($venda_id)
    {
        $this->venda_id = $venda_id;
    }

    /**
     * @return mixed
     */
    public function getLivroId()
    {
        return $this->livro_id;
    }

    /**
     * @param mixed $livro_id
     */
    public function setLivroId($livro_id)
    {
        $this->livro_id = $livro_id;
    }

    /**
     * @return mixed
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param mixed $quantidade
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;
    }
}