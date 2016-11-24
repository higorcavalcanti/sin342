<?php
class Persistencia {

    /**
     * @var $instancia Persistencia Instancia da classe atual (para usar estaticamente)
     * @var $conn PDO Instancia do MySQLI conectado ao banco atual
     * @var $host string Endereço do Servidor MySQL
     * @var $user string Usuário do Servidor MySQL
     * @var $pass string Senha do Servidor MySQL
     * @var $db string Banco de dados do Servidor MySQL
     */
    private static $instancia;
	private $conn;
    private $host = "localhost";
	private $user = "root";
	private $pass = "root";
	private $db = "sin352";


    /**
     * Persistencia constructor.
     * @param $host string  Endereço do servidor
     * @param $user string  Usuário
     * @param $pass string  Senha
     * @param $db string    Nome do banco de dados
     */
	public function __construct($host=null, $user=null, $pass=null, $db=null){
		if($host != null){
			$this->host = $host;
			$this->user = $user;
			$this->pass = $pass;
			$this->db = $db;
		}
		$this->conn = $this->conecta();
	}

    /**
     * Função que conecta ao banco de dados
     * @return PDO
     */
	public function conecta(){
        $pdo = new PDO("mysql:host={$this->host};dbname={$this->db};charset=utf8", $this->user, $this->pass);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        return $pdo;
	}

    /**
     * Obtem uma instancia da persistencia
     * @return Persistencia
     */
	public static function instancia() {
        if(self::$instancia == null)
            self::$instancia = new self();
        return self::$instancia;
    }

    /**
     * Realiza um select no banco de dados
     * @param $tabela string Tabela a ser consultada
     * @param $campos array Campos a serem retornados
     * @param $where string Condição de seleção
     * @param $whereValues array Array contendo os valores para o where
     * @param $orderby string Condição de ordenação
     * @return array Array contendo os dados
     */
	public function select($tabela, $campos=null, $where=null, $whereValues=null, $orderby=null, $limit=null) {

	    $sql = "SELECT ";
		if($campos != null) $camposSQL = implode(",", $campos );
		else $camposSQL = "*";

        if($where == null) $where = '';
        else $where = "WHERE {$where}";

        $orderbySQL = '';
        if($orderby != null ) $orderbySQL = "ORDER BY {$orderby}";

        $limitSQL = '';
        if($limit != null ) $limitSQL = "LIMIT {$limit}";

        $query = "SELECT {$camposSQL} FROM {$tabela} {$where} {$orderbySQL} {$limitSQL}";

        $consulta = $this->conn->prepare($query);

        $arr = [];
		if($consulta->execute($whereValues)) {
            $i = 0;
			while($reg = $consulta->fetch(PDO::FETCH_ASSOC)){
				$arr[$i++] = $reg;
			}
		}
		return $arr;
	}

    /**
     * Insere dados no banco de dados
     * @param $tabela string Tabela para inserir
     * @param $arrayCampos array Array contendo os campos à serem inseridos
     * @param $arrayValores array Array contendo os valores à serem inseridos
     * @return bool|mixed False se falhou ou o ID do objeto inserido
     */
	public function insert($tabela, $arrayCampos, $arrayValores){

		$arrayCampos = implode(", ", $arrayCampos);
		
		$query = "INSERT INTO {$tabela} ({$arrayCampos}) VALUES (".str_repeat('?,',count($arrayValores)-1)."?)";

        $consulta = $this->conn->prepare($query);
        if(!$consulta->execute($arrayValores)) {
			return false;
		}
		return $this->conn->lastInsertId();
	}

    /**
     * Atualiza um objeto no banco de daods
     * @param $tabela string Tabela a ser atualizada
     * @param $set array Array contendo Campos e valores a serem atualizados
     * @param $where string Condição de seleçã
     * @param $whereValues array Array contendo os valores para o where
     * @return bool|int False se falhar ou a quantidade de linhas afetdadas
     */
	public function update($tabela, $set, $where, $whereValues){

        $values = [];
		foreach($set as $campo => $valor){
			$set[$campo] = $campo. " = ?";
            $values[] = $valor;
		}

		$set = implode(", ", $set);
		$query = "UPDATE {$tabela} SET {$set} WHERE {$where}";


        $consulta = $this->conn->prepare($query);
        if(!$consulta->execute( array_merge($values, $whereValues) )) {
			return false;
		}
		return $this->conn->rowCount();
	}

    /**
     * Deleta algo do banco de dados
     * @param $tabela string Tabela para deletar o item
     * @param $where array Condição de seleção
     * @param $whereValues array Array contendo os valores para o where
     * @return bool|int False se falhar ou a quantidade de linahs deletadas
     */
	public function delete($tabela, $where, $whereValues){
	    $query = "DELETE FROM {$tabela} WHERE {$where}";

        $consulta = $this->conn->prepare($query);

        if(!$consulta->execute( $whereValues )) {
			return false;
		}
		return $this->conn->rowCount();
	}
}