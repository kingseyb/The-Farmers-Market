<?php

session_start();


if(!isset($_SESSION['email']))
{

  header("Location: index.php?login=invalid");
 

} 

$result = file_get_contents("http://farmersmarket.com/api/v1/crop.php?crop_id=".$_GET['crop_id']);
								// Will dump a beauty json :3
									$crop = json_decode($result, true);

?>



<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Farmers Market - View Crops</title>

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
				<div class="page-header">

					<!-- Header content -->
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Explore</span> - View Crops</h4>

							<ul class="breadcrumb position-right">
								<li><a href="index.html">Home</a></li>
								<li><a href="user_pages_profile.html">Explore</a></li>
								<li class="active">View Crops</li>
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
									<img src="/uploads/crops/cropimage/<?php echo $crop['imageLink']; ?>" width="100px"  />
								</div>
							
						    	<div class="caption text-center">
						    		<h6 class="text-semibold no-margin"><?php if (isset($_SESSION['email'])) { echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; }?><small class="display-block">Farmer</small></h6>
						    	</div>
					    	</div>
					    	<!-- /user thumbnail -->
					    	<div id="map" class="thumbnail" style="height: 350px;"></div>

					    <div class="thumbnail">
						
							<!-- Embed element -->
							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Crop Video</h5>
								</div>

								<div class="panel-body">
									<div class="embed-responsive embed-responsive-16by9">
										<embed class="embed-responsive-item" src="/uploads/crops/cropvideo/<?php echo $crop['videoLink']; ?>">
									</div>
								</div>
							</div>
							<!-- /embed element -->

						</div>
					<!-- /embedding options -->

					<div class="thumbnail file-styled-primary btn bg-blue">
									<audio controls class="">
									  <source src="/uploads/crops/cropaudio/<?php echo $crop['audioLink']; ?>" type="audio/ogg">
									  <source src="#" type="audio/mpeg">
									Your browser does not support the audio element.
									</audio>


					</div>
					


						</div>

						<div class="col-lg-9">
									<!-- Navigation -->
					    	<div class="panel panel-flat">
								<div class="panel-heading">
									<h6 class="panel-title">Crop Information</h6>
								
								</div>

								<div class="list-group border no-padding-top">
									<h2 href="#" class="list-group-item"> Name: <span class=" btn-primary bg-slate-400 btn-rounded btn-xlg" style="font-size: 18px;"><?php echo $crop['crop_name'];?></span></h2>

									<h2 href="#" class="list-group-item"> Description: <span class="btn-primary bg-slate-400 btn-rounded  btn-xlg" style="font-size: 18px;"><?php echo $crop['crop_description'];?></span></h2>
									<h2 href="#" class="list-group-item "> Price: <span class="btn-primary bg-slate-400 btn-rounded  btn-xlg" style="font-size: 18px;">₵ <?php echo $crop['crop_price'];?></span></h2>
									<h2 href="#" class="list-group-item"> Location: <span class="btn-primary bg-slate-400 btn-rounded  btn-xlg" style="font-size: 18px;"><?php echo $crop['crop_location'];?></span></h2>
									<div class="list-group-divider"></div>
									<h2 href="#" class="list-group-item">Contact <span class="badge bg-teal-400 pull-right" style="font-size: 18px;"><?php echo $_SESSION['numberp'];?></span></h2>
									<h2 href="#" class="list-group-item">Date Published <span class="badge bg-teal-400 pull-right" style="font-size: 18px;"><?php echo $crop['datecreated'];?></span></h2>
									
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

	<script>
      function initMap() {
        var myLatLng = {lat: <?php echo round($crop['latitude'], 6);;?>, lng: <?php echo round($crop['longitude'], 6);?>};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: myLatLng,
          zoom: 4
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          draggable:false,
          position: myLatLng,
          title: 'Hello World!'
        });

        google.maps.event.addListener(marker, 'dragend', function (evt) {
    	document.getElementById('latitude').value = evt.latLng.lat();
    document.getElementById('longitude').value = evt.latLng.lng();


      });
    }

    </script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDm17Jao103JcnNmHZak8YYd4rIRsqgJMA&callback=initMap" async defer></script>

</body>
</html>
