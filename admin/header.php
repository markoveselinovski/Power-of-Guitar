    <head>
        <title>S A M P L E</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/all.min.css" rel="stylesheet">
		<link href="../css/brands.min.css" rel="stylesheet">
		<link href="../css/animate.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>

    </head>
	
    <header id="header">
		<?php session_start(); ?>


			<nav class="navbar navbar-expand-md navbar-dark">
				<div class="container">
					<div class="navbar-brand">	
						<a href="admin.php"><img src="../images/logowhiteicon.ico"></a>
					</div>
					<h2 class="text-light">Logged in as <?php echo $_SESSION['user']?></h2>
  					<a href="logout.php" class="btn btn-outline-primary">Log Out <i class="fas fa-sign-out-alt"></i></a>
				</div>
			</nav>

    </header>

	