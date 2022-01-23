<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Stock Management System</title>
<style>

.topnav {
  
  padding-top: 10px;
  padding-bottom: -10px;
}

.topnav li{
  float: left;
  color: #04AA6D;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
}

.topnav li:hover {
  background-color: #ddd;
  color: black;
}

.topnav li.active {
  background-color: ;
  color: white;
}

</style>
	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>

</head>
<body >
<div class="topnav" style=" margin: 0px;">

	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- <a class="navbar-brand" href="#">Brand</a> -->
	  <a class="navbar-brand" href="#" style="padding:0px;">
                    
                </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right" >  
      <img src="images/logo" height="60px;" style="margin-right: 50px; float: left;">      
        <li><a href="aboutus.php"><i class="glyphicon glyphicon-book"></i>About Project</a></li> 

      	<?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
        <li id=""><a href="customer.php"> <i class="glyphicon glyphicon-envelope"></i> Customer</a></li>        
    <?php } ?>
        <li id=""><a href="Brand.php"><i class="glyphicon glyphicon-btc"></i>  Brand</a></li>        
		
		<?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
        <li id=""><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Category</a></li>        
		<?php } ?>
		<?php if(isset($_SESSION['userId']) && $_SESSION['userId']==1) { ?>
        <li id=""><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Product </a></li> 
		<?php } ?>
		
        <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id=""><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>            
            <li id=""><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>            
          </ul>
        </li> 
       <li id=""><a href="team.php"><i class="glyphicon glyphicon-user"></i>Team</a></li>
           <li id=""><a href="contact.php"><i class="glyphicon glyphicon-earphone"></i>Contact us</a></li>
            <li id=""><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li> 
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
  </div>
<script src="custom/js/brand.js"></script>

<?php require_once 'includes/footer.php'; ?>