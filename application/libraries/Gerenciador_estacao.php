<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gerenciador_estacao {
	
	private $lista_estacoes = null;
	
	public function __construct(){
					
		$Charitas = array(
				'nome_estacao'				=>	'Charitas',
				'nome_cliente'				=> 	'EMUSA',
				'diretorio_logs'			=>	'C:\\ftp\\EMUSA\\emusa1\\Raw\\',
				'parametros_estacao'		=>	array( 
						'Data Hora'			=>	'dd/mm/aa hh:mm:ss', 
						'*WS Min'			=>	'm/s',
						'Wind Speed' 		=>	'm/s',
						'*WS Max'			=>	'm/s',
						'*WS SD'			=>	'm/s',
						'*WS OK'			=>	'%',
						'*Prev Dir'			=>	'Deg',
						'Wind Direction'	=>	'Deg',
						'*RIS VEL'			=>	'Deg',
						'*WD SD'			=>	'Deg',
						'*CALM PERC'		=>	'%',
						'*WD OK'			=>	'%',
						'*SR Min'			=>	'w/m2',
						'Solar Radiation'	=>	'w/m2',
						'*SR Max'			=>	'w/m2',
						'*SR SD'			=>	'w/m2',
						'*SR OK'			=>	'%',
						'*RH Min'			=>	'%',
						'Relative Humidity'	=>	'%',
						'*RH Max'			=>	'%',
						'*RH SD'			=>	'%',
						'*RH OK'			=>	'%',
						'*AT Min'			=>	'C',
						'Air Temperature'	=>	'C',
						'*AT Max'			=>	'C',
						'*AT SD'			=>	'C',
						'*AT OK'			=>	'%',
						'Barom Pressure'	=>	'mbar',
						'Rain Total'		=>	'mm',
						'*RAIN OK'			=>	'%',
				),
		);
				
		$Itaipu = array(
				'nome_estacao'				=>	'Itaipu',
				'nome_cliente'				=> 	'EMUSA',
				'diretorio_logs'			=>	'C:\\ftp\\EMUSA\\itaipu\\Raw\\',
				'parametros_estacao'		=>	array( 
						'Data Hora'			=>	'dd/mm/aa hh:mm:ss', 
						'*WS Min'			=>	'm/s',
						'Wind Speed' 		=>	'm/s',
						'*WS Max'			=>	'm/s',
						'*WS SD'			=>	'm/s',
						'*WS OK'			=>	'%',
						'*Prev Dir'			=>	'Deg',
						'Wind Direction'	=>	'Deg',
						'*RIS VEL'			=>	'Deg',
						'*WD SD'			=>	'Deg',
						'*CALM PERC'		=>	'%',
						'*WD OK'			=>	'%',
						'*SR Min'			=>	'w/m2',
						'Solar Radiation'	=>	'w/m2',
						'*SR Max'			=>	'w/m2',
						'*SR SD'			=>	'w/m2',
						'*SR OK'			=>	'%',
						'*RH Min'			=>	'%',
						'Relative Humidity'	=>	'%',
						'*RH Max'			=>	'%',
						'*RH SD'			=>	'%',
						'*RH OK'			=>	'%',
						'*AT Min'			=>	'C',
						'Air Temperature'	=>	'C',
						'*AT Max'			=>	'C',
						'*AT SD'			=>	'C',
						'*AT OK'			=>	'%',
						'Barom Pressure'	=>	'mbar',
						'Rain Total'		=>	'mm',
						'*RAIN OK'			=>	'%',
				),
		);
		
		$this->lista_estacoes = array( 
				'Charitas'	=>	$Charitas , 
				'Itaipu'	=>	$Itaipu ,
		);
	
	}
	
	
	public function selecionar_nomes_estacoes_cliente( $nome_cliente )
	{
		$lista_nome_estacoes_cliente = array();
		
		foreach ( $this->lista_estacoes as $estacao )
		{
			if( $estacao['nome_cliente'] == $nome_cliente )
			{
				array_push( $lista_nome_estacoes_cliente , $estacao[ 'nome_estacao' ] );
			}
		}
		
		if(count( $lista_nome_estacoes_cliente )> 0){
			return $lista_nome_estacoes_cliente;
		}
		else
		{
			return false;
		}
	}
	
	
	
	public function selecionar_estacao( $nome_estacao )
	{
		if(array_key_exists( $nome_estacao , $this->lista_estacoes ))
		{
			return $this->lista_estacoes[ $nome_estacao ];
		}
		else
		{
			return false;
		}
	}
		
}