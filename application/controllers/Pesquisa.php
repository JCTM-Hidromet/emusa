<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesquisa extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		
		$this->load->library('session');
		$this->load->library('table');
		$this->load->model(	'Estacao_model' );
		$this->load->model(	'Pesquisa_model' );
		
	}
	
	public function exibir()
	{
		$titulo 				=	"Resultado da Pesquisa";
		$data_inicial			=	$this->input->get('data_inicial');
		$data_final				=	$this->input->get('data_final');
		$nome_cliente			= 	$this->session->userdata('nome_cliente');
		$nome_estacao			=	$this->input->get('nome_estacao');
		$estacao 				=	$this->Estacao_model->selecionar_estacao( $nome_estacao );
						
		if(($this->verifica_data($data_inicial, $data_final)) === true)
		{
			$dados_pesquisados		=	$this->Pesquisa_model->pesquisar_por_periodo( $estacao , $data_inicial , $data_final );
			$dados_view = array(
					'titulo'			=>	$titulo,
					'nome_cliente'		=>	$nome_cliente,
					'nome_estacao'		=>	$estacao[ 'nome_estacao' ],
					'data_inicial'		=>	$data_inicial,
					'data_final'		=>	$data_final,
					'tabela'			=>	$this->gerar_tabela( $dados_pesquisados ),
			);
			$this->load->view( 'Pesquisa_Exibir_view' , $dados_view );
		}
		else
		{
			$dados_view		=	array(
					'titulo'					=>	$titulo,
					'nome_cliente'				=>	$nome_cliente,
					'nomes_estacoes_cliente'	=>	$this->Estacao_model->selecionar_nomes_estacoes_cliente( $nome_cliente ),
					'mensagem'					=>	"Erro no per&iacute;odo informado para pesquisa",
					'classe_mensagem'			=>	'alert alert-danger',
			);
			$this->load->view('Estacao_Pesquisar_view' , $dados_view);
		}		
		
	
	}

	

	private function gerar_tabela( $dados_pesquisados )
	{
		
		$cabecalho		=	$dados_pesquisados['cabecalho'];
		$subcabecalho	=	$dados_pesquisados['subcabecalho'];
		$corpo			=	$dados_pesquisados['corpo'];
		$cabtab			=	array();
		
		$this->table->set_template( array('table_open'	=> '<table class="table">') );
		
		for( $i = 0 ; $i < count( $cabecalho ) ; $i++ ){
			array_push( $cabtab , $cabecalho[$i] . '<br/><small>'. $subcabecalho[$i]  . '</small>');
		}
		
		$this->table->set_heading($cabtab);
		
		foreach($corpo as $linha)
		{
			$this->table->add_row($linha);
		}
		
		return $this->table->generate();
	}
	

	
	public function exportar_csv(){
		$nome_cliente			= 	$this->session->userdata('nome_cliente');
		$nome_estacao			=	$this->input->get('nome_estacao');
		$data_inicial			=	$this->input->get('data_inicial');
		$data_final				=	$this->input->get('data_final');
		$estacao 				=	$this->Estacao_model->selecionar_estacao( $nome_estacao );
		$dados_pesquisados		=	$this->Pesquisa_model->pesquisar_por_periodo( $estacao , $data_inicial , $data_final );
		
		$this->gerar_csv( $dados_pesquisados );
	
	}
	

	
	private function gerar_csv( $dados_pesquisados )
	{
		
		header('Content-Type: text/csv; charset=utf-8');
		header('Content-Disposition: attachment; filename=data.csv');
		
		$output		=	fopen( 'php://output', 'w');
		$dados		=	array();
		$dados[]	=	$dados_pesquisados['cabecalho'];
		$dados[]	=	$dados_pesquisados[ 'subcabecalho' ];
		
		foreach ( $dados_pesquisados[ 'corpo' ] as $linha ){
			$dados[] = $linha;
		}
				
		foreach ($dados as $linha_csv)
		{
			fputcsv( $output , $linha_csv , ';' );
		}
		
		fclose( $output ); 
		
	}
	
	private function verifica_data($data_ini, $data_fin)
	{
		$dt_ini = date_create_from_format( "d/m/Y H:i" ,$data_ini);
		$dt_fin = date_create_from_format( "d/m/Y H:i" ,$data_fin);
		
		if( $dt_fin > $dt_ini)
		{
			return true;
			
		}else{
			return false;
			
		}
	}
}
	
	
	
