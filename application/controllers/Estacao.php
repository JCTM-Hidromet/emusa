<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estacao extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->library( 'session' );
		$this->load->model(	'Estacao_model'	);
		
	}


	public function pesquisar()
	{
		$titulo					=	"Pesquisa de Dados";
		$nome_cliente			= 	$this->session->userdata('nome_cliente');
		$nomes_estacoes_cliente	=	$this->Estacao_model->selecionar_nomes_estacoes_cliente( $nome_cliente );
		
		$dados_view				=	array(
			'titulo' 					=> 	$titulo,
			'nome_cliente'				=>	$nome_cliente,
			'nomes_estacoes_cliente'	=>	$nomes_estacoes_cliente
		);
		
		$this->load->view( 'Estacao_Pesquisar_view' , $dados_view );
		
	}
	
	
}
