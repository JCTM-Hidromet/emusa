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
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
	
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-md-12">
				<div class="page-header">
	  				<h1><?php echo $titulo ?></h1>
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
		<form action="<?php echo base_url('Conta/autenticar') ?>" method="post" name="login" >
			<div class="row-fluid">
				<div class="col-md-4 col-md-offset-4">
					<div class="form-group">
						<label for="nome_cliente">Cliente</label>
						<input type="text" class="form-control" name="nome_cliente" value="" id="nome_cliente" placeholder="Nome do Cliente">
					</div>
					<div class="form-group">
						<label for="senha_cliente">Senha</label>
						<input type="password" class="form-control" name="senha_cliente" value="" id="senha_cliente" placeholder="Senha do Cliente" >
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="col-md-4 col-md-offset-4">
					<button type="submit" class="btn btn-default btn-block" name="enviar" id="enviar" value="enviar">Acessar <span class="fa fa-sign-in" aria-hidden="true"></span></button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>