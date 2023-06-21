    <head>
        <title>POWER OF GUITAR</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/all.min.css" rel="stylesheet">
		<link href="css/brands.min.css" rel="stylesheet">
		<link href="css/animate.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

    </head>
    <header id="header">

			<nav class="navbar navbar-expand-lg navbar-dark">
				<div class="container">
				<div class="navbar-brand">	
					<a href="index.php"><img src="images/logowhiteicon.ico"></a>
				</div>
					<ul class="navbar-nav mr-auto">
					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-warning font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Instruments</a>
						<div class="dropdown-menu bg-warning">
						<?php 
							include("db_connect.php");
							$query="SELECT * FROM instrument";
							$result=mysqli_query($conn,$query);
							while($row = mysqli_fetch_assoc($result))
							{
								echo '<a class="dropdown-item font-weight-bold" href="show.php?action=show_instruments&iid='.$row['iid'].'">'.$row['name'].'s</a>';
							}
						?>
					</li>
					
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-danger font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">Brands</a>
						<div class="dropdown-menu bg-danger">
						<?php 
							include("db_connect.php");
							$query="SELECT * FROM brand ORDER BY name ASC";
							$result=mysqli_query($conn,$query);
							while($row = mysqli_fetch_assoc($result))
							{
								echo '<a class="dropdown-item text-light font-weight-bold" href="show.php?action=show_brands&bid='.$row['bid'].'">'.$row['name'].'</a>';
							}
						?>
					</li>
					
					<li class="nav-item">
						<a class="nav-link text-info font-weight-bold" data-toggle="modal" data-target="#contact">Contact&nbsp;<i class="fas fa-envelope"></i></a>
					</li>
					</ul>
					<div class="collapse navbar-collapse">
						<form class="form-inline mx-auto" action="search.php" action="get">
							<div class="input-group mr-1">
								<input type="text" class="form-control bg-transparent text-light" placeholder="Search" id="search" name="search">
								<div class="input-group-append">
								<button class="btn btn-outline-info " type="submit"><i class="fas fa-search"></i></button>
								</div>
							</div>
						</form>
					</div>

					<a href="cart.php" class="btn btn-outline-success mr-1">Cart&nbsp;<i class="fas fa-shopping-cart"></i></a>
					<button type="button" class="btn btn-outline-primary ml-1" data-toggle="modal" data-target="#login">
  						Log In <i class="fas fa-sign-in-alt"></i>
					</button>
				</div>
			</nav>
			
			<!-- Contact Form Modal -->
			<div class="modal fade" tabindex="-1" id="contact">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header text-info">
							<h5 class="modal-title mx-auto">Contact Us</h5>
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">
							<i class="fas fa-times"></i>
							</button>
						</div>
						<div class="modal-body">
							<form class="form" action="contact.php" method="post">
								<div class="form-row mb-2">
									<div class="col">
										<input class="form-control" name="first_name" type="text" placeholder="First Name" required>
									</div>
									<div class="col">
										<input class="form-control" name="last_name" type="text" placeholder="Last Name" required>
									</div>
								</div>
								<input class="form-control mb-2" name="email" type="email" placeholder="Email" required>
								<textarea class="form-control" name="message" type="text" placeholder="Message" required></textarea>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-outline-info w-100">Send Message <i class="fas fa-paper-plane"></i></button>
							</div>
							</form>
					</div>
				</div>
			</div>
			<!--/Contact Form Modal -->

			<!-- Login Form Modal -->
			<div class="modal fade" tabindex="-1" id="login">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header text-primary">
							<h5 class="modal-title mx-auto">Log In</h5>
							<button type="button" class="btn btn-outline-danger" data-dismiss="modal">
							<i class="fas fa-times"></i>
							</button>
						</div>
						<div class="modal-body">
							<form class="form" action="admin/login.php" method="post">
								<input class="form-control mb-2" type="text" name="username" placeholder="Username" required>
								<input class="form-control" type="password" name="password" placeholder="Password" required>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-outline-primary w-100">Log In <i class="fas fa-sign-in-alt"></i></button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<!--/Login Form Modal -->

    </header>

	