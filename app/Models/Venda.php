<?php
class Venda extends Model {

    protected $id;
    protected $data;
    protected $usuario_id;

    public function __construct($obj = array()) {
        $this->setAll($obj);
    }

    /**
     * Retorna o usuário (Objeto) da venda atual
     * @return Usuario
     */
    public function getUsuario() {
        $u = new UsuariosTable();
        return $u->getById( $this->getUsuarioId() );
    }

    /**
     * Retorna a lista de itens da venda atual
     * @return Usuario
     */
    public function getVendaItens() {
        $t = new VendaItensTable();
        $itens = $t->getByVenda( $this->getId() );
        return is_array($itens) ? $itens : [$itens];
    }

    public function getValor() {
        $valor = 0;
        foreach ($this->getVendaItens() as $item) {
            $valor += ($item->getQuantidade() * $item->getLivro()->getPreco());
        }
        return number_format($valor, 2, ',', '.');
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
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * @param mixed $usuario_id
     */
    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

}