<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesquisa_model extends CI_Model {
		
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Gerenciador_pesquisa');
	}

	public function pesquisar_por_periodo( $estacao , $data_inicial , $data_final )
	{
		return $this->gerenciador_pesquisa->pesquisar_por_periodo( $estacao , $data_inicial , $data_final );
	}
	

}