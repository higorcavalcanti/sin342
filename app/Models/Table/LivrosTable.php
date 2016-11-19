<?php
class LivrosTable extends Table {

    public function __construct()
    {
        parent::__construct("livros", Livro::class);
    }

    /**
     * Obtem o livro que está sendo manipulado
     * @return mixed Livro manipulado
     */
    public function getLivro() {
        return $this->getObject();
    }

    /**
     * Define o livro que está sendo manipulado
     * @param $livro Livro a ser manipulado
     */
    public function setLivro($livro) {
        $this->setObject($livro);
    }

    public function getByCategoria($categoria_id) {
        return parent::get(null,"categoria_id=?",[$categoria_id],null);
    }

}