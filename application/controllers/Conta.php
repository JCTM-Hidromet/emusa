<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->library( 'session' );
		$this->load->model( 'Conta_model' );
	}
	
	
	public function autenticar()
	{
		$nome_cliente	=	$this->input->post( 'nome_cliente' );
		$senha_cliente	=	$this->input->post( 'senha_cliente' );
				
		if ( $this->Conta_model->validar_conta( $nome_cliente , $senha_cliente ) )
		{
			
			$dados_session =  array(
					'nome_cliente' => $nome_cliente
			);
						
			$this->session->set_userdata( $dados_session );
			redirect( 'Estacao/pesquisar' );
							
		}
		else
		{
			$mensagem = 'Erro de valida&ccedil;&atilde;o de usu&aacute;rio';
			$dados_view = array(
					'mensagem'			=> $mensagem,
					'classe_mensagem'	=> 'alert alert-danger',
					'titulo'			=> 'Autentica&ccedil;&atilde;o de Clientes',
			);
			
			$this->load->view('Conta_Autenticar_view' , $dados_view);
				
		}
		
	}
		
	
	public function desconectar()
	{
		$mensagem = 'Usu&aacute;rio desconectado.';
		
		$dados_view = array(
					'mensagem'			=> $mensagem,
					'classe_mensagem'	=> 'alert alert-success',
					'titulo'			=> 'Autentica&ccedil;&atilde;o de Clientes',
		);
			
		$this->load->view('Conta_Autenticar_view' , $dados_view);
	}

}
