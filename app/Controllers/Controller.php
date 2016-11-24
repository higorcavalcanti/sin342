<?php
require_once("app/PageConstructor.php");

class Controller {

    /**
     * Atributo do tipo Page
     * @var Page
     */
    public $_page;

    /**
     * Controller constructor.
     */
    public function __construct() {
        $this->_page = new Page();
    }

    public function index() {
        $this->redirect('./index');
    }


    public function isPost() {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    public function getPost($postValue) {
        return isset($_POST[$postValue]) ? $_POST[$postValue] : null;
    }
    public function getParam( $param ) {
        $param += 2; //Pra começar apartir da action e não do controller
        $get = ( isset( $_GET['key'] ) ? explode( '/', $_GET['key'] ) : array() );
        if( array_key_exists( $param, $get ) )
            return $get[$param];
        else return false;
    }

    public function redirect($url) {
        $url = __dir().$url;
        header("Location: {$url}");
        die();
    }
}
