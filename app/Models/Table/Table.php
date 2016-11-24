<?php
abstract class Table {

    /**
     * @var $object = Objeto sendo editado atualmente.
     * @var $table = Nome da tabela no MySQL     *
     * @var $type = Tipo da classe dos itens
     */
    private $object;
    private $table;
    private $type;

    /**
     * Table constructor.
     * @param $table Tabela que será trabalhada
     * @param $type Tipo do Objeto a ser criado (class)
     */
    public function __construct($table, $type)
    {
        $this->table = $table;
        $this->type = $type;
    }

    /**
     * Retorna o objeto sendo manipulado atualmente
     * @return mixed Objeto sendo manipulado
     */
    protected function getObject() {
        return $this->object;
    }

    /**
     * Define o objeto que será manipulado
     * @param $object Objeto a ser manipulado
     */
    protected function setObject($object) {
        $this->object = $object;
    }

    /**
     * Obtem APENAS UM registro do banco de dados
     * @param $id Identificador do objeto que será retornado
     * @return array|mixed Objeto retornado
     */
    public function getById($id){
        $this->setObject( $this->parse( Persistencia::instancia()->select($this->table, null, "id=?", array($id), null) ) );
        return $this->getObject();
    }

    /**
     * Retorna uma lista de TODOS objetos do banco de dados
     * @return array|mixed Lista de objetos
     */
    public function getAll(){
        return $this->parse( Persistencia::instancia()->select($this->table, null, null, null, null) );
    }

    /**
     * Apenas chama o metodo SELECT e realiza o PARSE
     */
    public function get($campos, $where, $whereValues, $orderby=null, $limit=null) {
        return $this->parse( $this->select($campos, $where, $whereValues, $orderby, $limit) );
    }

    /**
     * Realiza um SELECT no banco de dados
     * @param $campos Campos à serem retornados
     * @param $where Condições à serem cumpridas
     * @param $orderby Condição de ordenação dos dados
     * @return array Array contendo os objetos em questão
     */
    public function select($campos, $where, $whereValues, $orderby=null, $limit=null) {
        return Persistencia::instancia()->select($this->table, $campos, $where, $whereValues, $orderby, $limit);
    }

    /**
     * Insere o objeto que está sendo manipulado no banco de dados
     * @return bool|mixed False se falhar ou o ID do objeto no banco
     */
    public function insert() {
        $insert = Persistencia::instancia()->insert($this->table,
            $this->object->keys(),
            $this->object->values()
        );
        if($insert !== false)
            $this->object->setId( $insert );
        return $insert;
    }

    /**
     * Atualiza o objeto sendo manipulado no banco de dados
     * @return bool|int False se falhou ao editar ou a quantidade de inhas modificadas
     */
    public function update() {
        return Persistencia::instancia()->update($this->table,
            $this->object->toArray(),
            "id=?",
            [$this->object->getId()]
        );
    }

    /**
     * Deleta o objeto sendo manipulado do banco de dados
     * @return bool|int False se falhar ou a quantidade de linhas modificadas
     */
    public function delete() {
        return Persistencia::instancia()->delete($this->table, "id=?", [$this->object->getId()]);
    }

    /**
     * Converte um array de atributos (vindo do banco) para um objeto
     * @param $arr Array de atributos (resultado do banco)
     * @return array|mixed Objeto do tipo correto
     */
    protected function parse($arr) {

        $result = [];
        foreach($arr as $item) {
            $result[] = new  $this->type($item);
        }
        if(count($result) == 1) $result = $result[0];
        return $result;
    }
}