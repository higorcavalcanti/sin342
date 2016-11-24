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

    public function getMaisVendidos($quantidade) {
        $campos = ["*", "(SELECT count(*) FROM venda_itens WHERE livro_id = id) as quantidade"];
        return parent::get($campos, null, null, "quantidade", $quantidade);
    }

    /**
     * Obtem todos os livros pertencentes à uma categoria
     * @param $categoria_id ID da categoria
     * @return array|mixed
     */
    public function getByCategoria($categoria_id) {
        return parent::get(null,"categoria_id=?",[$categoria_id],null);
    }

    /**
     * Obtem todos os livros pertencentes à uma editora
     * @param $editora_id ID da editora
     * @return array|mixed
     */
    public function getByEditora($editora_id) {
        return parent::get(null,"editora_id=?",[$editora_id],null);
    }

}