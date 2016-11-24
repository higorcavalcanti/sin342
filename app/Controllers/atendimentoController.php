<?php
class atendimentoController extends Controller {

	public function index() {

	    $at = new AtendimentosTable();
        $atendimentos = $at->getAll();

        $this->_page->view('atendimento/index', compact('atendimentos'));
	}
}