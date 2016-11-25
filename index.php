<?php
session_name("SIN-342");
session_start();

header('Content-type: text/html; charset=UTF-8');

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

date_default_timezone_set("Brazil/East");

function __autoload($class) {

	if( file_exists("app/Models/{$class}.php") )
		require_once("app/Models/{$class}.php");

	else if( file_exists("app/Models/Table/{$class}.php") )
		require_once("app/Models/Table/{$class}.php");
}

class IndexRouter {

	public static $_action, $_control;

	public function __construct(){

	    $key = (isset($_GET['key']) ? $_GET['key'] : "home")."/"; //Variavel passada por GET que contém todos os dados da rota
        $route = explode("/", $key);

		self::$_control = $route[0]; //Primeiro parametro da rota
		self::$_action = ($route[1] != null) ? $route[1] : 'index'; //Segundo parametro da rota

        require_once("app/Controllers/Controller.php");
        require_once("app/Persistencia.php");
	}
	
	public function callController() {

		$controller = self::$_control;
		$file = "app/Controllers/{$controller}Controller.php";

        //Se o arquivo existe, adiciona ele ao código
		if(file_exists($file)) {
            require_once($file);
        }
        else { //Se não existe, redireciona para Erro 404
			header("Location: " . __dir() . "erro/e404");
            exit();
		}
		$controllerName = self::$_control . "Controller";
		$controller = new $controllerName();

        $acao = self::$_action;
		if(method_exists($controller, $acao))
			$controller->$acao();
		else $controller->index();
	}

}

function __dir(){
	return str_replace("\\", "/", (substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])) . "\\"));
}

$index = new IndexRouter();
$index->callController();