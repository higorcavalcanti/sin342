<?php
class Persistencia {

    /**
     * @var $instancia Instancia da classe atual (para usar estaticamente)
     * @var $conn Instancia do MySQLI conectado ao banco atual
     * @var $host Endereço do Servidor MySQL
     * @var $user Usuário do Servidor MySQL
     * @var $pass Senha do Servidor MySQL
     * @var $db Banco de dados do Servidor MySQL
     */
    private static $instancia;
	private $conn;
    private $host = "localhost";
	private $user = "root";
	private $pass = "root";
	private $db = "sin352";


    /**
     * Persistencia constructor.
     * @param null $host Endereço do servidor
     * @param null $user Usuário
     * @param null $pass Senha
     * @param null $db Nome do banco de dados
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
     * @return mysqli
     */
	public function conecta(){
		return new mysqli($this->host, $this->user, $this->pass, $this->db);
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
     * @param $tabela Tabela a ser consultada
     * @param null $campos Campos a serem retornados
     * @param null $where Condição de seleção
     * @param null $orderby Condição de ordenação
     * @return array Array contendo os dados
     */
	public function select($tabela, $campos=null, $where=null, $orderby=null) {

        $where = $this->conn->real_escape_string($where); //Anti MySQL Injection

		if($campos != null) $campos = implode(",", $campos);
		else $campos = "*";

		if($orderby == null) $orderby = '';
		else $orderby = "ORDER BY " . $this->conn->real_escape_string($orderby);

		if($where == null) $where = '';
        else $where = "WHERE {$where}";

        $query = "SELECT {$campos} FROM {$tabela} {$where} {$orderby}";

        $consulta = $this->conn->query($query);

        $arr = [];
		if(!$this->conn->error) {
            $i = 0;
			while($reg = $consulta->fetch_array()){
				$arr[$i++] = $reg;
			}
		}
		return $arr;
	}

    /**
     * Insere dados no banco de dados
     * @param $tabela Tabela para inserir
     * @param $arrayCampos Array contendo os campos à serem inseridos
     * @param $arrayValores Array contendo os valores à serem inseridos
     * @return bool|mixed False se falhou ou o ID do objeto inserido
     */
	public function insert($tabela, $arrayCampos, $arrayValores){
		
		foreach($arrayCampos as $key => $a) 
			$arrayCampos[$key] = $this->conn->real_escape_string($a); //Anti MySQL Injection

		foreach($arrayValores as $key => $a) 
			$arrayValores[$key] = $this->conn->real_escape_string($a); //Anti MySQL Injection


		$arrayCampos = implode(", ", $arrayCampos);
		$arrayValores = "'" . implode("', '",$arrayValores) . "'";
		
		$query = "INSERT INTO {$tabela} ({$arrayCampos}) values ({$arrayValores})";

		if(!$this->conn->query($query)){
			return false;
		}
		return $this->conn->insert_id;
	}

    /**
     * Atualiza um objeto no banco de daods
     * @param $tabela Tabela a ser atualizada
     * @param $set Array contendo Campos e valores a serem atualizados
     * @param $where Condição de seleçã
     * @return bool|int False se falhar ou a quantidade de linhas afetdadas
     */
	public function update($tabela, $set, $where){
		$where = $this->conn->real_escape_string($where); //Anti MySQL Injection

		foreach($set as $campo=>$valor){
			$set[$campo] = $this->conn->real_escape_string($campo) . " = '" . $this->conn->real_escape_string($valor) . "'";
		}

		$set = implode(", ", $set);
		$query = "UPDATE {$tabela} SET {$set} WHERE {$where}";

		if(!$this->conn->query($query)){
			return false;
		}
		return $this->conn->affected_rows;
	}

    /**
     * Deleta algo do banco de dados
     * @param $tabela Tabela para deletar o item
     * @param $where Condição de seleção
     * @return bool|int False se falhar ou a quantidade de linahs deletadas
     */
	public function delete($tabela, $where){
		if(!$this->conn->query("DELETE FROM {$tabela} WHERE {$where}")){
			return false;
		}
		return $this->conn->affected_rows;
	}
}