<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gerenciador_pesquisa {
	
	public function __construct(){
		
	}

	
	public function pesquisar_por_periodo( $estacao , $data_inicial , $data_final )
	{
		
		$linha_colunas_cabecalho	=	$this->tabelar_colunas_cabecalho( $estacao );
		$linha_colunas_subcabecalho =	$this->tabelar_colunas_subcabecalho( $estacao );
		$linhas_colunas_dados_log	=	$this->tabelar_colunas_pesquisa_log( $estacao , $data_inicial , $data_final );
		
		return $this->tabelar_dados( $linha_colunas_cabecalho , $linha_colunas_subcabecalho , $linhas_colunas_dados_log );
		 
	}
	
	
	public function tabelar_colunas_cabecalho( $estacao )
	{
		
		$parametros		=	array_keys( $estacao['parametros_estacao'] );
		$cabecalho 		=	array();
		
		foreach ($parametros as $param )
		{
			if( substr( $param , 0 , 1) != '*')
			{
				array_push( $cabecalho , $param );
			}
			else
			{
				continue;
			}
		}
		return $cabecalho;
	}
	
		
	public function tabelar_colunas_subcabecalho( $estacao )
	{
		$parametros				=	array_keys( $estacao['parametros_estacao'] );
		$unid_parametros		=	array_values( $estacao['parametros_estacao'] );
		$subcabecalho	 		=	array();
		
		for ( $i = 0 ; $i < count( $parametros ) ; $i++ )
		{
			if( substr( $parametros[ $i ] , 0 , 1) != '*')
			{
				array_push( $subcabecalho , $unid_parametros[ $i ] );
			}
			else
			{
				continue;
			}
			
		}
				
		return $subcabecalho;
	}
	
	
	public function tabelar_colunas_pesquisa_log( $estacao , $data_inicial , $data_final )
	{
		$conjunto_linhas		=	array();
		$diretorio_pesquisa		=	$estacao['diretorio_logs'];
		$lista_parametros		=	array_keys( $estacao[ 'parametros_estacao' ] );
		$mnpldr_diretorio		=	opendir( $diretorio_pesquisa );
		
		while ( false !== ( $nome_arquivo = readdir( $mnpldr_diretorio ) ) )
		{
			if ( substr( $nome_arquivo , -4 ) == ".txt" )
			{
				$caminho_arquivo		=	$diretorio_pesquisa . "\\" . $nome_arquivo;
				$mnpldr_arquivo			=	fopen( $caminho_arquivo , "r");
		
				while ( ( $linha_texto = fgets( $mnpldr_arquivo ) ) !== false )
				{
					$padrao_data = "/^(\d){2}\/(\d){2}\/(\d){2}(\s)(\d){2}\:(\d){2}\:(\d){2}/";
						
					if( preg_match( $padrao_data, $linha_texto , $match ))
					{
						$valores			=	explode(";", $linha_texto);
						$linha_valores   	=	array();
						$data_linha 		=	date_create_from_format( "y/m/d H:i:s" , $valores[0] );
						$data_ini			=	date_create_from_format( "d/m/Y H:i" , $data_inicial );
						$data_fin			=	date_create_from_format( "d/m/Y H:i" , $data_final );
						$dt					=	date_format( $data_linha , "d/m/y H:i:s" );
						
						array_push( $linha_valores , $dt );
		
						if( $data_linha >= $data_ini && $data_linha <= $data_fin )
						{
							for( $i = 1 ; $i < count( $lista_parametros ) ; $i ++ )
							{
								if( substr( $lista_parametros[ $i ] , 0 , 1 ) != '*' )
								{
									$valor = doubleval( $valores[ $i ] );
									array_push( $linha_valores , $valor );
								}
								else
								{
									continue;
								}
							}
						}
						else
						{
							continue;
						}
							
					}
					else
					{
						continue;
					}
					
					array_push( $conjunto_linhas , $linha_valores )	;
				}
			}
			else
			{
				continue;
			}
		}
		
		closedir($mnpldr_diretorio);

		usort( $conjunto_linhas , array( $this , "comparar" ));
		
		return $conjunto_linhas;
	}
		
	
	private function tabelar_dados( $linha_colunas_cabecalho , $linha_colunas_subcabecalho , $linhas_colunas_dados_log ) 
	{
		
		$tabela_dados = array();
		
		$tabela_dados['cabecalho']			=	$linha_colunas_cabecalho;
		$tabela_dados[ 'subcabecalho' ]		=	$linha_colunas_subcabecalho;
		$tabela_dados[ 'corpo']				=	$linhas_colunas_dados_log;
		
		return $tabela_dados;
	}
	
	
	private function comparar($a , $b)
	{
		$data_a = date_create_from_format( "d/m/y H:i:s" , $a[0] );
		$data_b = date_create_from_format( "d/m/y H:i:s" , $b[0] );
	
		if ( $data_a == $data_b )
		{
			return 0;
		}
		return ( $data_a < $data_b ) ? -1 : 1;
	
	}
	
			
}
		
		

