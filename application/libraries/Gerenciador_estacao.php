<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gerenciador_estacao {
	
	private $lista_estacoes = null;
	
	public function __construct(){
					
		$Charitas = array(
				'nome_estacao'				=>	'Charitas',
				'nome_cliente'				=> 	'EMUSA',
				'diretorio_logs'			=>	'C:\data\EMUSA\charitas', //'D:\FTP\EMUSA\emusa1\Raw',
				'parametros_estacao'		=>	array( 
						'Data Hora'			=>	'dd/mm/aa hh:mm:ss', 
						'WS Max'			=>	'm/s',
						'WS Avg' 			=>	'm/s',
						'WS Min'			=>	'm/s',
						'WS SDev'			=>	'm/s',
						'WS OK'				=>	'%',
						'Prev Dir'			=>	'Deg',
						'Ris Dir '			=>	'Deg',
						'Ris Vel'			=>	'Deg',
						'WD Sdev'			=>	'Deg',
						'Calm Perc'			=>	'%',
						'WD OK'				=>	'%',
						'SR Max'			=>	'w/m2',
						'SR Avg'			=>	'w/m2',
						'SR Min'			=>	'w/m2',
						'SR SDev'			=>	'w/m2',
						'SR OK'				=>	'%',
						'RH Max'			=>	'%',
						'RH Avg'			=>	'%',
						'RH Min'			=>	'%',
						'RH SDev'			=>	'%',
						'RH OK'				=>	'%',
						'AT Min'			=>	'C',
						'AT Avg'			=>	'C',
						'AT Max'			=>	'C',
						'AT Sdev'			=>	'C',
						'AT OK'				=>	'%',
						'Barom Pressure'	=>	'mbar',
						'RAIN Total'		=>	'mm',
						'RAIN OK'			=>	'%',
				),
			);
				
		$Itaipu = array(
				'nome_estacao'				=>	'Itaipu',
				'nome_cliente'				=> 	'EMUSA',
				'diretorio_logs'			=>	'C:\data\EMUSA\charita', //'D:\FTP\EMUSA\itaipu\Raw',
				'parametros_estacao'		=>	array( 
						'Data Hora'			=>	'dd/mm/aa hh:mm:ss', 
						'WS Max'			=>	'm/s',
						'WS Avg' 			=>	'm/s',
						'WS Min'			=>	'm/s',
						'WS SDev'			=>	'm/s',
						'WS OK'				=>	'%',
						'Prev Dir'			=>	'Deg',
						'Ris Dir '			=>	'Deg',
						'Ris Vel'			=>	'Deg',
						'WD Sdev'			=>	'Deg',
						'Calm Perc'			=>	'%',
						'WD OK'				=>	'%',
						'SR Max'			=>	'w/m2',
						'SR Avg'			=>	'w/m2',
						'SR Min'			=>	'w/m2',
						'SR SDev'			=>	'w/m2',
						'SR OK'				=>	'%',
						'RH Max'			=>	'%',
						'RH Avg'			=>	'%',
						'RH Min'			=>	'%',
						'RH SDev'			=>	'%',
						'RH OK'				=>	'%',
						'AT Min'			=>	'C',
						'AT Avg'			=>	'C',
						'AT Max'			=>	'C',
						'AT Sdev'			=>	'C',
						'AT OK'				=>	'%',
						'Barom Pressure'	=>	'mbar',
						'RAIN Total'		=>	'mm',
						'RAIN OK'			=>	'%',
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