<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}
	
	public function index()
	{
		$titulo = "Autentica&ccedil;&atilde;o de Clientes";
		$dados_view = array('titulo' => $titulo);
		
		$this->load->view( "Conta_Autenticar_view" , $dados_view);
		
	}

}
