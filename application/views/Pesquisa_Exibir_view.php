<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/views/assets/css/style.css') ?>" />
		
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
	
	<title><?php echo $titulo ?></title>
	
</head>

<body>

	<div class="container-fluid">
		<!-- header-->
			<div class="row-fluid">
				<div class="col-md-12">
					<div class="masthead">
						<div class="container-head">
							<h1><?php echo $nome_cliente ?><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('Conta/desconectar')?>" role="button">Sair  <span class="fa fa-sign-out" aria-hidden="true"></span></a></h1>
						</div>
					</div>
				</div><!-- /col-md-12 -->
			</div><!-- /row-fluid -->
		<!-- /header-->
		
		<!-- main content -->
			<div class="row-fluid">
				<div class="col-md-12">
					
					<div class="panel panel-info">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-4"><a class="btn btn-sm pull-left" href='<?php echo base_url("Estacao/pesquisar")?>' role="button"><span class="fa fa-chevron-left" aria-hidden="true"> voltar</span></a></div>
								<div class="col-md-4"><h4 class="text-center"><strong><?php  echo 'Esta&ccedil;&atilde;o ' . $nome_estacao ?></strong></h4></div>
								<div class="col-md-4"><a class="btn btn-sm pull-right" href='<?php echo base_url("Pesquisa/exportar_csv?nome_estacao={$nome_estacao}&data_inicial={$data_inicial}&data_final={$data_final}")?>' role="button">exportar <span class="fa fa-file-excel-o" aria-hidden="true"></span></a></div>
							</div>
						</div>
  						<div class="panel-body">
  							<div class="panel panel-default">
								<div class="panel-heading">
									<p><?php  echo 'Per&iacute;odo: ' . $data_inicial . ' - ' . $data_final ?></p>
								</div>
  								<div class="panel-body">
  									<div class="table-responsive">
										<?php echo $tabela  ?>
									</div>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
			</div><!-- /row-fluid -->
	</div>
</body>

</html>
