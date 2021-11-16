<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

	$go = $this->input->get('go');

	if(!isset($go)) {
		$go = "home";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
	<title>goFlux</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo link_tag("/assets/favicon.ico", "shortcut icon", "image/ico"); ?>

	<!-- css -->
	<?php echo link_tag(BASE_URL."assets/css/style.css"); ?>
	<?php echo link_tag(BASE_URL."assets/css/datatables.min.css"); ?>
	<?php echo link_tag("https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"); ?>
	<?php echo link_tag("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"); ?>

	<!-- scripts -->
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/plugins/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/plugins/datatables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<?php
		if($go == "embarcador" || $go == "home") {
			echo "<script type='module' src='".BASE_URL."assets/js/embarcador.js'></script>";
		} else if($go == "oferta") {
			echo "<script type='module' src='".BASE_URL."assets/js/oferta.js'></script>";
		} else if($go == "lance") {
			echo "<script type='module' src='".BASE_URL."assets/js/lance.js'></script>";
		}
	?>
	
</head>
<body>

<header>

	<div class="menu">
		<ul>
			<li class="logo">
				<a href="<?php echo BASE_URL; ?>"><img height="44" title="goFLux" src="<?php echo BASE_URL; ?>assets/images/logo.png"></a>
			</li>
			<li class="menu-item hidden">
				<a href="<?php echo BASE_URL; ?>goflux/index?go=embarcador">Embarcador / Transportador</a>
			</li>
			<li class="menu-item hidden">
				<a href="<?php echo BASE_URL; ?>goflux/index?go=oferta">Oferta</a>
			</li>
			<li class="menu-item hidden">
				<a href="<?php echo BASE_URL; ?>goflux/index?go=lance">Lance</a>
			</li>
		</ul>
	</div>

	<div class="heroe">

		<h1>Welcome to goFlux</h1>

		<h2>Teste para Desenvolvedor Back-end</h2>

	</div>

</header>

<section>

	<!-- ebarcador -->
	<div id="div_embarcador" style="display: block">
		<div class="further">

			<h1>Embarcador e Transportador</h1>

			<div class="h80">
				<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#cad_embarcador">Cadastrar Embarcador / Transportador</button>
			</div>

			<div class="modal fade" id="cad_embarcador" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Cadastrar Embarcador / Transportador</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form id="myform">
							<div class="modal-body">
									<div class="mb-3">
										<label for="id" class="col-form-label">ID:</label>
										<input type="text" class="form-control" readonly id="id">
									</div>
									<div class="mb-3">
										<label for="name" class="col-form-label">Empresa:</label>
										<input type="text" class="form-control" required id="name">
									</div>
									<div class="mb-3">
										<label for="doc" class="col-form-label">CNPJ:</label>
										<input type="text" class="form-control" required id="doc">
									</div>
									<div class="mb-3">
										<label for="active" class="col-form-label">Ativo:</label>
										<div class="form-check form-switch">
											<input type="checkbox" id="active" class="form-check-input" checked="checked"/>
										</div>
									</div>
									<div class="mb-3">
										<label for="site" class="col-form-label">Site:</label>
										<input type="text" class="form-control" required id="site">
									</div>
									<div class="mb-3">
										<label for="about" class="col-form-label">Sobre:</label>
										<textarea class="form-control" required id="about"></textarea>
									</div>		
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary" id="btn_save_embarcador">Salvar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<table id="table1" class="display" style="width:100%">
				<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="15%">NAME</th>
						<th width="20%">DOC</th>
						<th width="35%">ABOUT</th>
						<th width="5%">ACTIVE</th>
						<th width="10%">SITE</th>
						<th width="10%">AÇÕES</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>

		</div>
	</div>
	<!-- ebarcador -->

	<!-- oferta -->
	<div id="div_oferta" style="display: none;">
		<div class="further">

			<h1>Oferta</h1>

			<div class="h80">
				<button class="btn btn-primary btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#cad_oferta">Cadastrar Oferta</button>
			</div>

			<div class="modal fade" id="cad_oferta" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Cadastrar Oferta</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form id="form_oferta">
							<div class="modal-body">
								<div class="mb-3">
									<label for="id_oferta" class="col-form-label">ID:</label>
									<input type="text" class="form-control" readonly id="id_oferta">
								</div>
								<div class="mb-3">
									<label for="id_customer" class="col-form-label">ID_Customer:</label>
									<input type="text" class="form-control" required id="id_customer">
								</div>
								<div class="mb-3">
									<label for="from" class="col-form-label">From:</label>
									<input type="text" class="form-control" required id="from">
								</div>
								<div class="mb-3">
									<label for="to" class="col-form-label">To:</label>
									<input type="text" class="form-control" required id="to">
								</div>
								<div class="mb-3">
									<label for="initial_value" class="col-form-label">Initial_value:</label>
									<input type="text" class="form-control" required id="initial_value">
								</div>
								<div class="mb-3">
									<label for="amount" class="col-form-label">Amount:</label>
									<input type="text" class="form-control" required id="amount">
								</div>
								<div class="mb-3">
									<label for="amount_type" class="col-form-label">Amount_type:</label>
									<input type="text" class="form-control" required id="amount_type">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary" id="btn_save_oferta">Salvar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<table id="table2" class="display" style="width:100%">
				<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="5%">ID_CUSTOMER</th>
						<th width="25%">FROM</th>
						<th width="25%">TO</th>
						<th width="10%">INITIAL_VALUE</th>
						<th width="10%">AMOUNT</th>
						<th width="10%">AMOUNT_TYPE</th>
						<th width="10%">AÇÕES</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>

		</div>
	</div>
	<!-- oferta -->

	<!-- lance -->
	<div id="div_lance" style="display: none;">
		<div class="further">

			<h1>Lance</h1>

			<div class="h80">
				<button class="btn btn-primary btn-success" type="button" data-bs-toggle="modal" data-bs-target="#cad_lance">Cadastrar Lance</button>
			</div>

			<div class="modal fade" id="cad_lance" tabindex="-1" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Cadastrar Lance</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<form id="form_lance">
							<div class="modal-body">
								<div class="mb-3">
									<label for="id_lance" class="col-form-label">ID:</label>
									<input type="text" class="form-control" readonly id="id_lance">
								</div>
								<div class="mb-3">
									<label for="id_provider" class="col-form-label">ID_Provider:</label>
									<input type="text" class="form-control" required id="id_provider">
								</div>
								<div class="mb-3">
									<label for="id_offer" class="col-form-label">ID_Offer:</label>
									<input type="text" class="form-control" required id="id_offer">
								</div>
								<div class="mb-3">
									<label for="value" class="col-form-label">Value:</label>
									<input type="text" class="form-control" required id="value">
								</div>
								<div class="mb-3">
									<label for="amountv" class="col-form-label">Amount:</label>
									<input type="text" class="form-control" required id="amountv">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
								<button type="submit" class="btn btn-primary" id="btn_save_lance">Salvar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<table id="table3" class="display" style="width:100%">
				<thead>
					<tr>
						<th width="5%">ID</th>
						<th width="5%">ID_PROVIDER</th>
						<th width="5%">ID_OFFER</th>
						<th width="30%">VALUE</th>
						<th width="30%">AMOUNT</th>
						<th width="25%">AÇÕES</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>

		</div>
	</div>
	<!-- lance -->

</section>

<footer>

	<div class="environment">

		<p>Página renderizada em {elapsed_time} seconds</p>

		<p>Ambiente: <?= ENVIRONMENT ?></p>

	</div>

	<div class="copyrights">

		<p>&copy; <?= date('Y') ?> Desenvolvido por Denis Futida</p>

	</div>

</footer>

<?php
	if($go == "embarcador" || $go == "home") {
		echo "<script>toggleDivEmbarcador()</script>";
	} else if($go == "oferta") {
		echo "<script>toggleDivOferta()</script>";
	} else if($go == "lance") {
		echo "<script>toggleDivLance()</script>";
	}
?>

</body>
</html>