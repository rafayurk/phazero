<?php
// session_start();
include('authentication.php');
include('includes/header.php');

?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">


                <?php
                if(isset($_SESSION['status']))
                {
                    echo "<h5 class='alert alert-success'>".$_SESSION['status']."</h5>";
                    unset($_SESSION['status']);
                }

                
                
                ?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Home</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: -->
    <link href="css/custom.css" rel="stylesheet">


</head>



<body>

   
	<!-- Feature -->
	<div class="jumbotron feature">
		<div class="container">
			<h1><span class="images/hse.jpg"></span>HSE Admin Portal</h1>
			<p>Developed by Phaze.Ro</p>
		</div>
	</div>


    <!-- Heading -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center">Manage All Administrative Functions</h1>
                <p class="lead text-center">Create and monitor admins, checklists and inspectors.</p>
            </div>
        </div>
    </div>

    <!-- Promos -->
	<div class="container-fluid">
        <div class="row promo">
        	<a href="#">
				<div class="col-md-4 promo-item item-1">
					<h3>
						Admins
					</h3>
					<img src="images/admin.png" height="100" width="100">
				</div>
            </a>
            <a href="#">
				<div class="col-md-4 promo-item item-2">
					<h3>
						Checklists
					</h3>
					<img src="images/checklists.png" height="100" width="100">
				</div>
            </a>
			
			<a href="#">
				<div class="col-md-4 promo-item item-3">
					<h3>
						Inspectors
					</h3>
					<img src="images/inspector.png" height="100" width="100">
				</div>
            </a>
        </div>
    </div><!-- /.container-fluid -->


	<!-- Footer -->
	<footer>
	
		
		
        <!-- Copyright etc -->
        <div class="small-print">
        	<div class="container">
        		<!-- <p><a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact</a></p> -->
        		<p>Copyright &copy; Phaze.Ro 2021 </p>
        	</div>
        </div>
        
	</footer>

	
    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- IE10 viewport bug workaround -->
	<script src="js/ie10-viewport-bug-workaround.js"></script>
	
</body>
<?php
include('includes/footer.php');
?>
</html>

