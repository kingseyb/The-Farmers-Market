<?php

session_start();


if(!isset($_SESSION['email']))
{

  header("Location: index.php?login=invalid");
 

} 


?>





<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Farmers Market - My Crops</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_basic.js"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-top">

	<!-- Main navbar -->
		<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			

			<ul class="nav navbar-nav navbar-right">


				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/placeholder.jpg" alt="">
						<span><?php if (isset($_SESSION['email'])) { echo $_SESSION['firstname']; }?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My Account</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						 <form action="include/logout.aut.php" method="POST">   
                 <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-color btn-round">Logout</button>

                </form> 
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->



	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
								<div class="media-body">

                 


									<span class="media-heading text-semibold"><?php if (isset($_SESSION['email'])) { echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; }?></span>



									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Accra , Ghana
									</div>
								</div>

						
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<?php

								if(isset($_SESSION['email'])){

									$eid = $_SESSION['id'];


									if ($_SESSION['type'] == 1) {
										

										echo '


										<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
										
                						<li><a href="explore.php"><i class="icon-eye"></i> <span>Explore</span></a></li>
				                		<li><a href="myaccount.php"><i class="icon-user"></i> <span>My Account</span></a></li>


										';
									}

									else{

										echo '
										<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
										<li><a href="dashboard.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
										<li class="active"><a href="explore.php"><i class="icon-eye"></i> <span>Explore</span></a></li>
										<li><a href="myaccount.php"><i class="icon-user"></i> <span>My Account</span></a></li>
										<li><a href=mycrops.php?user_id=' . $eid . '"><i class="icon-circle"></i> <span>My Crops</span></a></li>
				                		<li><a href="addcrops.php"><i class="icon-add"></i> <span>Add Crops</span></a></li>

										';

										
									}
								}

								?>
								<!-- Main -->
								<li>
									<a href="#"><i class="icon-stack2"></i> <span>Other</span></a>
									<ul>
										<li><a href="faq.php">Faq</a></li>
										<li><a href="#">Setting</a></li>
                  					</ul>
								</li>

                 		<form action="include/logout.aut.php" method="POST">   
      					 <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block btn-color-green btn-round">Logout</button>

      					</form> 	

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Explore</h4>
							
						</div>
					</div>

					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li class="active">Explore</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">

					<!-- Basic datatable -->
					<div class="panel panel-flat">
						<div class="panel-heading">
							<h5 class="panel-title">ALL CROPS</h5>
							<div class="heading-elements">
								<ul class="icons-list">
			                		<li><a data-action="collapse"></a></li>
			                	</ul>
		                	</div>
						</div>

						<div class="panel-body">
							 

						<table class="table datatable-basic">
							<thead>
								<tr>
									<th>Crop Id</th>
									<th>Crop Image</th>
									<th>Crop Name</th>
									<th>Crop Description</th>
									<th>Crop Price</th>
									<th>Crop Location</th>
									<th>Date Uploaded</th>
									<th>View</th>
								
								</tr>
							</thead>
							<tbody>
			
								<?php 

									$result = file_get_contents("http://farmersmarket.com/api/v1/crop.php");
								// Will dump a beauty json :3
									$crop = json_decode($result, true);

									foreach ($crop as $key => $value) { ?>


									<tr>

									<td><?php echo $value['crop_id']; ?></td>
									<td><img src="/uploads/crops/cropimage/<?php echo $value['imageLink']; ?>" width="100px"  /></td>
									<td><?php echo $value['crop_name']; ?></td>
									<td><?php echo $value['crop_description']; ?></td>
									<td>GH¢ <?php echo $value['crop_price']; ?> /KG</td>
									<td><?php echo $value['crop_location']; ?></td>
									<td><?php echo $value['datecreated']; ?></td>
									<td><a href="viewcrops.php?crop_id=<?php echo $value['crop_id']; ?>" class="btn btn-primary btn-block">VIEW</a></td>
									
									
									
								</tr>
										
									


									<?php } ?>
								
								
			
	


							</tbody>
						</table>
					</div>
					<!-- /basic datatable -->


				

				

				

					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2017. <a href="#">Farmers Market</a> by Kingsley Budali</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
