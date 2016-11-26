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

    public function vendas() {

        $vt = new VendasTable();
        $venda_id = $this->getParam(0);

        if($venda_id) {
            $venda = $vt->getById($venda_id);
            $this->_page->adminView('admin/vendas/detalhes', compact('venda'));
        }
        else {
            $vendas = $vt->getAll();
            $this->_page->adminView('admin/vendas/view', compact('vendas'));
        }
    }

    public function clientes() {

        $ut = new UsuariosTable();
        $usuario_id = $this->getParam(0);

        if($usuario_id) {
            $usuario = $ut->getById($usuario_id);
            $this->_page->adminView('admin/clientes/detalhes', compact('usuario'));
        }
        else {
            $usuarios = $ut->getAll();
            $this->_page->adminView('admin/clientes/view', compact('usuarios'));
        }
    }


    /*
     *
     * LIVROS
     *
     */
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
        $it = new ImagesTable();

        //Se o livro existe
        if($livro = $lt->getById($id)) {

            //Remove a imagem
            $it->getById( $livro->getImageId() );
            $it->delete();

            //Remove o livro
            $lt->delete();
        }
        $this->redirect("admin/livros");
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
            if(!$this->getPost('titulo'))
                $erro = "Você não inseriu um titulo!";
            if(!$this->getPost('preco'))
                $erro = "Você não inseriu um preço!";
            if(!$this->getPost('autor'))
                $erro = "Você não inseriu um autor!";
            if(!$this->getPost('descricao'))
                $erro = "Você não inseriu uma descrição!";
            if(!$this->getPost('categoria_id'))
                $erro = "Você não selecionou uma categoria!";
            if(!$this->getPost('editora_id'))
                $erro = "Você não selecionou uma editora!";
        }

        //Se enviou algo, tenta atualizar (ou cadastrar)
        if($this->isPost() && $erro == '') {

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

            $this->redirect("admin/livros");
        }

        $this->_page->adminView("admin/livros/edit", compact('livro', 'editoras', 'categorias', 'titulo'));
    }



    /*
     *
     * Categorias
     *
     */
    public function categorias() {
        $action = $this->getParam(0);
        $id = $this->getParam(1);

        if($action == "add") {
            return $this->categorias_edit(-1);
        }
        else if($action == "remove") {
            return $this->categorias_remove($id);
        }
        else if($action == "edit") {
            return $this->categorias_edit($id);
        }
        else {
            $ct = new CategoriasTable();
            $categorias = $ct->getAll();

            $this->_page->adminView("admin/categorias/view", compact('categorias'));
        }
    }

    public function categorias_remove($id) {

        $ct = new CategoriasTable();

        //Se a Categoria existe
        if($categoria = $ct->getById($id)) {
            //Remove a categoria
            $ct->delete();
        }
        $this->redirect("admin/categorias");
    }

    public function categorias_edit($categoria_id) {

        $ct = new CategoriasTable();

        $titulo = "";

        if($categoria_id < 0) { //Nova categoria
            $categoria = new Categoria();
            $titulo = "Adicionar nova categoria";
        }
        else {
            $categoria = $ct->getById($categoria_id);
            $titulo = "Editar categoria '{$categoria->getNome()}'";
        }

        if($this->isPost()) {
            if(!$this->getPost('nome'))
                $erro = "Você não inseriu um nome!";
        }

        //Se enviou algo, tenta atualizar (ou cadastrar)
        if($this->isPost() && $erro == '') {

            $categoria->setAll($_POST);
            $ct->setCategoria($categoria);

            if($categoria_id < 0) { //Nova categoria
                $ct->insert();
            } else {
                $ct->update();
            }

            $this->redirect("admin/categorias");
        }

        $this->_page->adminView("admin/categorias/edit", compact('categoria','titulo'));
    }




    /*
     *
     * Editoras
     *
     */
    public function editoras() {
        $action = $this->getParam(0);
        $id = $this->getParam(1);

        if($action == "add") {
            return $this->editoras_edit(-1);
        }
        else if($action == "remove") {
            return $this->editoras_remove($id);
        }
        else if($action == "edit") {
            return $this->editoras_edit($id);
        }
        else {
            $et = new EditorasTable();
            $editoras = $et->getAll();

            $this->_page->adminView("admin/editoras/view", compact('editoras'));
        }
    }

    public function editoras_remove($id) {

        $et = new EditorasTable();

        //Se a Editora existe
        if($editora = $et->getById($id)) {
            $et->delete();
        }
        $this->redirect("admin/editoras");
    }

    public function editoras_edit($id) {

        $et = new EditorasTable();

        $titulo = "";
        $erro = "";

        if($id < 0) { //Nova Editora
            $editora = new Editora();
            $titulo = "Adicionar nova editora";
        }
        else {
            $editora = $et->getById($id);
            $titulo = "Editar editora '{$editora->getNome()}'";
        }

        if($this->isPost()) {
            if(!$this->getPost('nome'))
                $erro = "Você não inseriu um nome!";
        }

        //Se enviou algo, tenta atualizar (ou cadastrar)
        if($this->isPost() && $erro == '') {

            $editora->setAll($_POST);
            $et->setEditora($editora);

            if($id < 0) { //Nova
                $et->insert();
            } else {
                $et->update();
            }

            $this->redirect("admin/editoras");
        }

        $this->_page->adminView("admin/editoras/edit", compact('editora','titulo'));
    }





    /*
     *
     * Atendimentos
     *
     */
    public function atendimentos() {
        $action = $this->getParam(0);
        $id = $this->getParam(1);

        if($action == "add") {
            return $this->atendimentos_edit(-1);
        }
        else if($action == "remove") {
            return $this->atendimentos_remove($id);
        }
        else if($action == "edit") {
            return $this->atendimentos_edit($id);
        }
        else {
            $at = new AtendimentosTable();
            $atendimentos = $at->getAll();

            $this->_page->adminView("admin/atendimentos/view", compact('atendimentos'));
        }
    }

    public function atendimentos_remove($id) {

        $at = new AtendimentosTable();

        //Se o atendimento existe
        if($atendimento = $at->getById($id)) {
            //Remove o atendimento
            $at->delete();
        }
        $this->redirect("admin/atendimentos");
    }

    public function atendimentos_edit($atendimento_id) {

        $at = new AtendimentosTable();

        $titulo = "";

        if($atendimento_id < 0) { //Novo Atendimento
            $atendimento = new Atendimento();
            $titulo = "Adicionar novo Atendimento";
        }
        else {
            $atendimento = $at->getById($atendimento_id);
            $titulo = "Editar atendimento '{$atendimento->getPergunta()}'";
        }

        if($this->isPost()) {
            if(!$this->getPost('pergunta'))
                $erro = "Você não inseriu uma pergunta!";
            if(!$this->getPost('resposta'))
                $erro = "Você não inseriu uma resposta!";
        }

        //Se enviou algo, tenta atualizar (ou cadastrar)
        if($this->isPost() && $erro == '') {

            $atendimento->setAll($_POST);
            $at->setAtendimento($atendimento);

            if($atendimento_id < 0) { //Novo atendimento
                $at->insert();
            } else {
                $at->update();
            }

            $this->redirect("admin/atendimentos");
        }

        $this->_page->adminView("admin/atendimentos/edit", compact('atendimento','titulo'));
    }
}