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

	private function parseVars($vars) {
	    foreach($vars as $i => $v) {
	        $this->$i = $v;
        }
    }

    /**
     * Carrega um arquivo de VIEW para mostrar ao usuário
     * @param $file string arquivo a ser carregado
     */
	public function load($file, $vars = []) {
	    $file = "app/Views/{$file}.php";

        $this->parseVars($vars);

        if(file_exists($file))
            require_once($file);
	}

    /**
     * Carrega um arquivo de view para mostrar ao usuário e adiciona o cabeçalho/rodapé
     * @param $file string Arquivo a ser carregado
     */
	public function view($file, $vars = []) {
		$this->header();
		$this->load($file, $vars);
		$this->footer();
	}
}
