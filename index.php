<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
		<title>Latihan Jquery</title>
	</head>
	<link rel="stylesheet" href="assets/style.css"/>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="assets/jquery-ui-1.12.1/jquery-ui.min.css"/>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="#">Perpustakaan</a>
			<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button> -->

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<?php  $opsiaktif = isset($_GET['url'])?$_GET['url']:''; ?>
					<li class="nav-item <?php if($opsiaktif =='member'){ echo "active"; } ?>">
						<a class="nav-link" href="index.php?url=member">Member</a>
					</li>
					<li class="nav-item <?php if($opsiaktif =='peminjaman'){ echo "active" ; } ?>">
						<a class="nav-link" href="index.php?url=peminjaman">Form Peminjaman</a>
					</li>
				</ul>
			</div>
		</nav>
		<br>
		
		<div class="row">
			<div class="container">
				<?php 
					
					include('opsi.php'); 
					if(isset($bagianHTML) && $bagianHTML !='')
						include($bagianHTML);
				?>
			</div>
		</div>
		<script src="assets/jquery-3.4.1.min.js"></script>
		<script src="assets/jquery-ui-1.12.1/jquery-ui.min.js"></script>
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<script src="assets/swal/dist/sweetalert2.all.min.js"></script>
		<script src="assets/jquery-loading/dist/jquery.loading.min.js"></script>
		
		<?php 
			if(isset($bagianJS) && $bagianJS !='')
				include($bagianJS);
		?>
		
	</body>
</html>