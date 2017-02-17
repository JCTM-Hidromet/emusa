<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    <title><?php echo $titulo ?></title>
           
	<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	
</head>
<body>
	<!-- CONTAINER -->
	<div class="container-fluid">
	
		<!-- HEADER -->
		<div class="row">
			<div class="col-md-12">
				<div class="page-header">
					<h1><?php echo $titulo ?><br /><small><?php echo $nome_cliente ?></small><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('Conta/desconectar')?>" role="button">Sair  <span class="fa fa-sign-out" aria-hidden="true"></span></a></h1>
				</div>
			</div>
		</div>
		<!-- HEADER -->
		
		<!-- CONTENT -->
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4><?php  echo 'Esta&ccedil;&atilde;o ' . $nome_estacao ?></h4>
				</div>
				<div class="panel-body">
					<p><?php  echo 'Per&iacute;odo: ' . $data_inicial . ' - ' . $data_final ?></p>
					<!-- table -->
					<div class="table-responsive">
						
						<?php echo $tabela  ?>
						
					</div>						
					<!-- table -->
			
				</div>
			</div>	
			
		<!-- CONTENT -->
		
		<!-- FOOTER -->
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-default pull-left" href='<?php echo base_url("Estacao/pesquisar")?>' role="button"><span class="fa fa-chevron-left" aria-hidden="true"></span></a>
				<a class="btn btn-default pull-right" href='<?php echo base_url("Pesquisa/exportar_csv?nome_estacao={$nome_estacao}&data_inicial={$data_inicial}&data_final={$data_final}")?>' role="button"><span class="fa fa-file-excel-o" aria-hidden="true"></span></a>
			</div>
		</div>
		<!-- FOOTER -->
		
	</div>
	<!-- CONTAINER -->
</body>
</html>