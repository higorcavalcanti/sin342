<?php
class EditorasTable extends Table {

    public function __construct()
    {
        parent::__construct("editoras", Editora::class);
    }

    /**
     * Obtem a editora que está sendo manipulada
     * @return mixed
     */
    public function getEditora() {
        return $this->getObject();
    }

    /**
     * Define a editora que está sendo manipulada
     * @param $editora Editora a ser manipulada
     */
    public function setEditora($editora) {
        $this->setObject($editora);
    }


    public function findByNome($nome) {
        $nomeLike = "%{$nome}%";
        $order = "CASE
					WHEN nome LIKE '{$nome}%' THEN 1
					WHEN nome LIKE '%{$nome}' THEN 3
					ELSE 2
				  END";

        $editoras = parent::get(null,"nome LIKE ?", [$nomeLike], $order);
        return is_array($editoras) ? $editoras : [$editoras];
    }
}