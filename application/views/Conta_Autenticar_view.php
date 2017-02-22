<!DOCTYPE html>

<html lang="pt-br">

<head>

	<meta content="text/html; charset=UTF-8" http-equiv="content-type">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" media="screen"  />
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" />
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
		<div class="row-fluid  masthead">
			<div class="col-md-4">
				<img class="materhead-logo img-thumbnail" src="<?php echo base_url('application/views/assets/images/logo_emusa.png') ?>">
			</div><!-- /col-md-4 -->
			<div class="col-md-8">
			</div><!-- /col-md-8 -->
		</div><!-- /row-fluid masthead -->
		<!-- /header-->
		
		<!-- main content -->
			<div class="row-fluid">
					<div class="col-md-12">
					
						<div class="panel panel panel-info">
							<div class="panel-heading"><h4 class="text-center"><strong><?php echo $titulo ?></strong></h4></div>
						<div class="panel-body">
						
							<div class="col-md-4 col-md-offset-4">
							
							<?php  if(isset($mensagem)): ?>
								<div class='<?php echo $classe_mensagem ?> text-center' role='alert'><?php echo $mensagem ?></div>
							<?php  endif; ?>
							
							
								<div class="panel panel-default">
	  								<div class="panel-body">
	    							   								
	    								<form action="<?php echo base_url('Conta/autenticar') ?>" method="post" name="login" >
								
											<!-- nome cliente -->
											<div class="form-group">
												<label for="nome_cliente">Cliente</label>
												<input type="text" class="form-control" name="nome_cliente" value="" id="nome_cliente" placeholder="Nome do Cliente">
											</div>
											<!-- /nome cliente -->
											
											<!-- senha cliente -->
											<div class="form-group">
												<label for="senha_cliente">Senha</label>
												<input type="password" class="form-control" name="senha_cliente" value="" id="senha_cliente" placeholder="Senha do Cliente" >
											</div>
											<!-- /senha cliente -->
											
											<!-- botao enviar -->
											<button type="submit" class="btn btn-primary btn-block" name="enviar" id="enviar" value="enviar">Acessar <span class="fa fa-sign-in" aria-hidden="true"></span></button>
											<!-- /botao enviar -->
																	
										</form>
	    							    								
	  								</div>
								</div> 
							</div>
						
						
							
						</div><!-- /painel-body -->
					</div><!-- /painel -->
																
				</div><!-- /col-md-4 col-md-offset-4 -->
			</div><!-- row-fluid -->
		<!-- /main content -->
		
	</div><!-- /container -->

</body>

</html>
