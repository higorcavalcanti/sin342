<?php
abstract class Model {

    public function __construct() {
    }

    /**
     * Converte um array para o objeto atual
     * @param $array
     */
    public function setAll($array) {
        foreach($array as $key => $value) {
            if( property_exists($this, $key) ) {
                $this->$key = $value;
            }
        }
    }

    /**
     * Converte o objeto atual para array
     * @return array Contendo o objeto atual
     */
    public function toArray() {
        return get_object_vars($this);
    }

    /**
     * Obtém uma lista de propriedades do objeto atual
     * @return array Array contendo as propriedades
     */
    public function keys() {
        return array_keys( $this->toArray() );
    }

    /**
     * Obtem a lista de valores das propriedades do objeto atual
     * @return array Array contendo os valores das propriedades
     */
    public function values() {
        return array_values( $this->toArray() );
    }
}