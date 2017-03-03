<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gerenciador_pesquisa {
	
	private $controle_data;
	
	public function __construct(){
		$this->controle_data	=	array();
	}

	
	public function pesquisar_por_periodo( $estacao , $data_inicial , $data_final )
	{
		
		$dados_tabelados					=	array();
		$dados_tabelados['cabecalho']		=	$this->tabelar_colunas_cabecalho( $estacao );
		$dados_tabelados['subcabecalho']	= 	$this->tabelar_colunas_subcabecalho( $estacao );
		$dados_tabelados['corpo']			=	$this->tabelar_colunas_pesquisa_log( $estacao , $data_inicial , $data_final );
		
		return $dados_tabelados;
				 
	}
	
	
	private function tabelar_colunas_cabecalho( $estacao )
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
	
		
	private function tabelar_colunas_subcabecalho( $estacao )
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
	
	
	private function tabelar_colunas_pesquisa_log( $estacao , $data_inicial , $data_final )
	{
		$conjunto_linhas		=	array();
		$diretorio_pesquisa		=	$estacao['diretorio_logs'];
		$lista_parametros		=	array_keys( $estacao[ 'parametros_estacao' ] );
		$mnpldr_diretorio		=	opendir( $diretorio_pesquisa );
		
		while ( false !== ( $nome_arquivo = readdir( $mnpldr_diretorio ) ) )//enquanto houver arquivos no diretorio para serem lidos
		{
			if ( substr( $nome_arquivo , -4 ) == ".txt" )// verifica se a extensão do arquivo é txt
			{
				$caminho_arquivo		=	$diretorio_pesquisa . "\\" . $nome_arquivo;
				$mnpldr_arquivo			=	fopen( $caminho_arquivo , "r" );
		
				while ( ( $linha_texto = fgets( $mnpldr_arquivo ) ) !== false )// enquanto houver linha para ser lida no arquivo
				{
					$padrao_data		=	"/^(\d){2}\/(\d){2}\/(\d){2}(\s)(\d){2}\:(\d){2}\:(\d){2}/";//determina o padrao data
					$ocorrencia_data	=	array();
						
					if( preg_match( $padrao_data, $linha_texto , $ocorrencia_data ))//verifica se a linha começa com o padrao data
					{
						$data_linha		=	date_create_from_format( "y/m/d H:i:s" , $ocorrencia_data[0] );
						$data_ini		=	date_create_from_format( "d/m/Y H:i" , $data_inicial );
						$data_fin		=	date_create_from_format( "d/m/Y H:i" , $data_final );
						
						if( $data_linha >= $data_ini && $data_linha <= $data_fin )
						{
							if( !($this->data_repetida($data_linha)) )
							{
								$valores	=	preg_split("/\;\s/", $linha_texto);
								
								if(count($valores) >= count($lista_parametros))//se a quantidade de valores da linha é menor que a quantidade de parâmetros
								{
									$linha_valores	=	array();
									array_push( $linha_valores , date_format( $data_linha , "d/m/y H:i:s" ) );
									
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
						}
						else
						{
							continue;
						}
					}
					array_push( $conjunto_linhas , $linha_valores )	;
				}
			}
			
		}
		closedir($mnpldr_diretorio);

		usort( $conjunto_linhas , array( $this , "comparar" ));
		
		return $conjunto_linhas;
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

	
	private function data_repetida($data){
		if( in_array($data , $this->controle_data) ){
			return true;
		}
		array_push($this->controle_data, $data);
		return false;
	}
}
		
		

