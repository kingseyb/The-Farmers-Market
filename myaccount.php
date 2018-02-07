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
	<title>Farmers Market - My Account</title>

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
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/visualization/echarts/echarts.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/user_pages_profile.js"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-top">

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
						<li><a href="myaccount.php"><i class="icon-user-plus"></i> My Account</a></li>
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
				                		<li class="active"><a href="myaccount.php"><i class="icon-user"></i> <span>My Account</span></a></li>


										';
									}

									else{

										echo '
										<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
										<li><a href="dashboard.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
										<li><a href="explore.php"><i class="icon-eye"></i> <span>Explore</span></a></li>
										<li class="active"><a href="myaccount.php"><i class="icon-user"></i> <span>My Account</span></a></li>
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
				<div class="page-header">

					<!-- Header content -->
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User Pages</span> - Profile</h4>

							<ul class="breadcrumb position-right">
								<li><a href="index.html">Home</a></li>
								<li><a href="user_pages_profile.html">User pages</a></li>
								<li class="active">Profile</li>
							</ul>
						</div>
					</div>
					<!-- /header content -->


			
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

					<!-- User profile -->
					<div class="row">
						
						<div class="col-lg-3">

							<!-- User thumbnail -->
							<div class="thumbnail">
								<div class="thumb thumb-rounded thumb-slide">
									<img src="assets/images/placeholder.jpg" alt="">
								</div>
							
						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin"><?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; ?><small class="display-block">Farmer</small></h6>

						    		<h6 class="text-semibold no-margin"><?php  echo $_SESSION['email'];?></h6>
						    	
						    		
	
						    	</div>
					    	</div>
					    	<!-- /user thumbnail -->



						</div>

						<div class="col-lg-9">

							<!-- Navigation -->
					    	<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Update Profile</h6>
								</div>

										<div class="panel-body">
							
							<div class="col-lg-12">
							<form class="form-horizontal" action="/include/addcrop.aut.php" method="POST" enctype="multipart/form-data">
								<fieldset class="content-group">

									<div class="col-lg-6">
									<div class="form-group" style="visibility: hidden;">
										<label class="control-label col-lg-2">User Id</label>
										<div class="col-lg-10">
											<input type="number" class="form-control" placeholder="" id="user_id" name="user_id" value="<?php echo $_SESSION['id'];?>" >
										</div>
									</div>
									
									<div class="form-group">
										<label class="control-label col-lg-2">First Name</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Enter your firstname here" id="firstname" name="firstname" value="<?php echo $_SESSION['firstname'];?>">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-lg-2">Last Name</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Enter your lastname here" id="lastname" name="lastname" value="<?php echo $_SESSION['lastname'];?>">
										</div>
									</div>


									<div class="form-group">
										<label class="control-label col-lg-2">Profile Image</label>
										<div class="col-lg-10">
											<input type="file" name="image" class="file-styled-primary btn bg-blue">
										</div>
									</div>
								
								</fieldset>

								
								<div class="text-right">
									<button type="submit" name="submit" class="btn bg-teal-400">UPDATE PROFILE <i class="icon-arrow-right14 position-right"></i></button>
								</div>

								
							</form>

						</div>

						 </div>
							</div>
							<!-- /navigation -->

							
						</div>
					</div>
					<!-- /user profile -->


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
