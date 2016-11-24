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


    public function findByTitulo($titulo) {
        $tituloLike = "%{$titulo}%";
        $order = "CASE
					WHEN titulo LIKE '{$titulo}%' THEN 1
					WHEN titulo LIKE '%{$titulo}' THEN 3
					ELSE 2
				  END";

        $livros = parent::get(null,"titulo LIKE ?", [$tituloLike], $order);
        return is_array($livros) ? $livros : [$livros];
    }

    public function findByAutor($autor) {
        $autorLike = "%{$autor}%";
        $order = "CASE
					WHEN autor LIKE '{$autor}%' THEN 1
					WHEN autor LIKE '%{$autor}' THEN 3
					ELSE 2
				  END";

        $livros = parent::get(null,"autor LIKE ?", [$autorLike], $order);
        return is_array($livros) ? $livros : [$livros];
    }

    public function findByEditora($editora) {
        $editorasTable = new EditorasTable();
        $editoras = $editorasTable->findByNome($editora);
        $ids = [];
        foreach ($editoras as $e) {
            $ids[] = $e->getId();
        }

        $where = str_repeat('?,', count($ids) - 1) . '?';
        $livros = parent::get(null, "editora_id IN ({$where})", $ids);
        return is_array($livros) ? $livros : [$livros];
    }

}