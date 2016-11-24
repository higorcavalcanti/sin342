<?php
class imageController extends Controller{

    public function view() {
        $it = new ImagesTable();
        if($image = $it->getById( $this->getParam(0) )) {
            Header( "Content-type: {$image->getMime()}");
            echo $image->getData();
        }
    }
}