<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estacao_model extends CI_Model {
		
	public function __construct(){
		parent::__construct();
		$this->load->library('Gerenciador_estacao');
	}

	public function selecionar_nomes_estacoes_cliente( $nome_cliente )
	{
		return $this->gerenciador_estacao->selecionar_nomes_estacoes_cliente( $nome_cliente );
	}
	
	
	public function selecionar_estacao( $nome_estacao ){
		return $this->gerenciador_estacao->selecionar_estacao( $nome_estacao );
	}
			
}