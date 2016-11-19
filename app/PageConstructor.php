<?php
class Page {

    public $usuario;

    public function __construct()
    {
        $usuarios = new UsuariosTable();
        $this->usuario = $usuarios->getBySession();
    }

    public function header(){
        $this->load("header");
	}

    /**
     * Mostra o rodapé na tela do usuário
     */
	public function footer(){
		$this->load("footer");
	}

    /**
     * Carrega um arquivo de VIEW para mostrar ao usuário
     * @param $file arquivo a ser carregado
     */
	public function load($file) {
	    $file = "app/Views/{$file}.php";

        if(file_exists($file)) require_once($file);
	}

    /**
     * Carrega um arquivo de view para mostrar ao usuário e adiciona o cabeçalho/rodapé
     * @param $file Arquivo a ser carregado
     */
	public function view($file) {
		$this->header();
		$this->load($file);
		$this->footer();
	}
}
