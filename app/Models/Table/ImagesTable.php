<?php
class ImagesTable extends Table {

    public function __construct()
    {
        parent::__construct("images", Image::class);
    }

    /**
     * Obtem a imagem que está sendo manipulada
     * @return mixed
     */
    public function getImage() {
        return $this->getObject();
    }

    /**
     * Define a imagem que está sendo manipulada
     * @param $cat Image imagem a ser manipulada
     */
    public function setImage($obj) {
        $this->setObject($obj);
    }
}