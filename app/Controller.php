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
}
