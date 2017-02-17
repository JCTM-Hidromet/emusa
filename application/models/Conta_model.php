<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->library('gerenciador_conta');
		
	}
	
	
	public function validar_conta ( $nome_cliente , $senha_cliente )
	{
		return $this->gerenciador_conta->validar_conta( $nome_cliente , $senha_cliente );
	}

}