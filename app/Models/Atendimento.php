<?php
class Atendimento extends Model {

    protected $id;
    protected $pergunta;
    protected $resposta;

    public function __construct($obj = array()) {
        $this->setAll($obj);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPergunta()
    {
        return $this->pergunta;
    }

    /**
     * @param mixed $pergunta
     */
    public function setPergunta($pergunta)
    {
        $this->pergunta = $pergunta;
    }

    /**
     * @return mixed
     */
    public function getResposta()
    {
        return $this->resposta;
    }

    /**
     * @param mixed $resposta
     */
    public function setResposta($resposta)
    {
        $this->resposta = $resposta;
    }


}