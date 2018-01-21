

<!DOCTYPE html>
<html>
<head>
	<title>GeoPagos - Test</title>
	<link href="<?php echo base_url('public/css/bootstrap.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('public/js/jquery-3.3.1.js')?>"></script>
	<script src="<?php echo base_url('public/js/bootstrap.js')?>"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
</head>
<body>
	<div id="container">
		<div class="row">
			<div class="col-md-12">

				<div class="col-md-8 col-md-offset-2" >
					<?php
						$this->load->view($contenido);
					?>
				</div>
				
			</div>
		</div>
		<footer>
			<hr>
			<center><b>Christian Odreman &nbsp; GeoPagos Test &nbsp; <?php echo date("d-m-Y");?></b></center>
		</footer>
	</div>
</body>


</html>  