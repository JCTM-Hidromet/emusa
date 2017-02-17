<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    <title><?php echo $titulo ?></title>
           
	<link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
	
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
	
</head>
<body>
	<!-- CONTAINER -->
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-md-12">
				<div class="page-header">
					<h1><?php echo $titulo ?><br /><small><?php echo $nome_cliente ?></small><a class="btn btn-default btn-sm pull-right" href="<?php echo base_url('Conta/desconectar')?>" role="button">Sair  <span class="fa fa-sign-out" aria-hidden="true"></span></a></h1>
				</div>
			</div>
		</div>
		<?php  if(isset($mensagem)): ?>
		<div class="row-fluid">
			<div class="col-md-4 col-md-offset-4">
				<div class='<?php echo $classe_mensagem ?>' role='alert'><?php echo $mensagem ?></div>
			</div>
		</div>
		<?php  endif; ?>
			<form action="<?php echo base_url('Pesquisa/exibir') ?>" method="get" name="pesquisaDados">
				<div class="row-fluid">
					<div class="col-md-4 col-md-offset-4">
					
						<div class="form-group">
							<label for="estacao">Esta&ccedil;&atilde;o</label>
							<select class="form-control" name="nome_estacao" id="nome_estacao">
							<?php foreach ( $nomes_estacoes_cliente as $nome_estacao ):?>
								<?php echo "<option>" . $nome_estacao ."</option>" ?>
							<?php endforeach;?>
							</select>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="col-md-4 col-md-offset-4">
						<div class="form-group">
	            			<label for="data_inicial">Data Inicial</label>
	               			<div class='input-group date' id='datetimepicker1'>
	                    		<input type='text' class="form-control" name="data_inicial" id="data_inicial"/>
	                    		<span class="input-group-addon">
	                        		<span class="glyphicon glyphicon-calendar"></span>
	                    		</span>
	                		</div>
	                		<script type="text/javascript">
	        					$(function () {
	            					$('#datetimepicker1').datetimepicker({
	                					locale: 'pt-br',
	                					defaultDate: new Date() - (24 * 60 * 60 * 1000)
	           						 });
	        					});
	   						</script>
	                	</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="col-md-4 col-md-offset-4">
						<div class="form-group">
	            			<label for="data_final">Data Final</label>
	               			<div class='input-group date' id='datetimepicker2'>
	                    		<input type='text' class="form-control" name="data_final" id="data_final"/>
	                    		<span class="input-group-addon">
	                        		<span class="glyphicon glyphicon-calendar"></span>
	                    		</span>
	                		</div>
	                		<script type="text/javascript">
	        					$(function () {
	            					$('#datetimepicker2').datetimepicker({
	                					locale: 'pt-br',
	                					defaultDate: new Date()
	           						 });
	        					});
	   						</script>
	                	</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="col-md-4 col-md-offset-4">
						<button type="submit" class="btn btn-default btn-block" name="pesquisar" id="pesquisar" value="pesquisar">Pesquisar <span class="fa fa-search" aria-hidden="true"></span></button>
					</div>
				</div>
			</form>
		</div>
</body>
</html>