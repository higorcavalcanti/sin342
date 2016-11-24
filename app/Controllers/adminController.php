<?php
class adminController extends Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->_page->usuario || $this->_page->usuario->getRole() != "admin") {
            $this->redirect("erro/e401");
        }
    }

    public function index() {
        $this->_page->view('admin/index');
    }
}