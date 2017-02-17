<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gerenciador_conta {
	
	private $conta = null;
	
	public function __construct()
	{
		$this->conta = array(
				'nome_cliente'	=>	'EMUSA',
				'senha_cliente'	=>	'emusa'
		);
	}
	
	public function validar_conta( $nome_cliente , $senha_cliente )
	{
		return( ( $this->conta['nome_cliente'] == $nome_cliente ) && ( $this->conta['senha_cliente'] == $senha_cliente ) );
	}
	
}