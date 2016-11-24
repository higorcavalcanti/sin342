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
        $this->_page->adminView('admin/index');
    }


    public function livros() {
        $action = $this->getParam(0);
        $id = $this->getParam(1);

        if($action == "add") {
            return $this->livros_edit(-1);
        }
        else if($action == "remove") {
            return $this->livros_remove($id);
        }
        else if($action == "view") {
            return $this->livros_view();
        }
        else if($action == "edit") {
            return $this->livros_edit($id);
        }
        else {
            $this->redirect("erro/e404");
        }
    }

    public function livros_remove() {
        $lt = new LivrosTable();
        $livro_id = $this->getParam(0);
        if($livro = $lt->getById($livro_id)) {
            $lt->delete();
        }
        $this->redirect("admin/livros/view");
    }

    public function livros_view() {
        $lt = new LivrosTable();
        $livros = $lt->getAll();

        $this->_page->adminView("admin/livros/view", compact('livros'));
    }

    public function livros_edit($livro_id) {
        $lt = new LivrosTable();
        if($livro_id < 0) { //Novo livro
            $livro = new Livro();
        } else {
            $livro = $lt->getById($livro_id);
        }

        if($this->isPost()) {
            $livro->setAll($_POST);
            $lt->setLivro($livro);
            if($livro_id < 0) { //Novo livro
                $lt->insert();
            } else {
                $lt->update();
            }
            $this->redirect("admin/livros/view");
        }

        $this->_page->adminView("admin/livros/edit", compact('livro'));
    }
}