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
        else if($action == "edit") {
            return $this->livros_edit($id);
        }
        else {
            $lt = new LivrosTable();
            $livros = $lt->getAll();

            $this->_page->adminView("admin/livros/view", compact('livros'));
        }
    }

    public function livros_remove($id) {
        $lt = new LivrosTable();
        if($livro = $lt->getById($id)) {
            $lt->delete();
        }
        $this->redirect("admin/livros/view");
    }

    public function livros_edit($livro_id) {

        $lt = new LivrosTable();
        $ct = new CategoriasTable();
        $et = new EditorasTable();
        $it = new ImagesTable();

        $titulo = "";
        $categorias = $ct->getAll();
        $editoras = $et->getAll();

        if($livro_id < 0) { //Novo livro
            $livro = new Livro();
            $image = new Image();
            $titulo = "Adicionar novo livro";
        }
        else {
            $livro = $lt->getById($livro_id);
            $image = $livro->getImage();
            $titulo = "Editar livro '{$livro->getTitulo()}'";
        }

        if($this->isPost()) {

            $livro->setAll($_POST);
            $lt->setLivro($livro);

            //Se enviou imagem
            if(is_uploaded_file( $_FILES["image"]["tmp_name"] ) && $_FILES["image"]["error"] === 0 )
            {
                $it->setImage($image);

                $image->setData( file_get_contents($_FILES["image"]["tmp_name"], 'rb') );
                $image->setMime( $_FILES["image"]["type"] );
                if($livro_id < 0) { //Novo livro
                    $it->insert();
                } else {
                    $it->update();
                }
                $livro->setImageId( $image->getId() );
            }

            if($livro_id < 0) { //Novo livro
                $lt->insert();
            } else {
                $lt->update();
            }

            $this->redirect("admin/livros/view");
        }

        $this->_page->adminView("admin/livros/edit", compact('livro', 'editoras', 'categorias', 'titulo'));
    }
}