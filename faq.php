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
	<title>farmers Market - FAQ</title>

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
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<!-- /theme JS files -->

</head>

<body class="navbar-top" >

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
			<!-- main sidebar -->
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
										<li><a href="explore.php"><i class="icon-eye"></i> <span>Explore</span></a></li>
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
										<li class="active"><a href="faq.php">Faq</a></li>
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
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Other Pages</span> - FAQ's</h4>

							<ul class="breadcrumb position-right">
								<li><a href="index.html">Home</a></li>
								<li><a href="general_faq.html">Other pages</a></li>
								<li class="active">FAQ's</li>
							</ul>
						</div>

	
					</div>
				</div>
				<!-- /page header -->


				<!-- Content area -->
				<div class="content">

				

					<!-- Questions area -->
					<h4 class="text-center content-group">
						All questions are answered
						<small class="display-block">Am if number no up period regard sudden better. Decisively surrounded all admiration</small>
					</h4>

					<div class="row">
						<div class="col-lg-9">

							<!-- Questions list -->
							<div class="panel-group panel-group-control panel-group-control-right">
								<div class="panel panel-white">
									<div class="panel-heading">
										<h6 class="panel-title">
											<a class="collapsed" data-toggle="collapse" href="#question1">
												<i class="icon-help position-left text-slate"></i> A without walking some objective?
											</a>
										</h6>
									</div>

									<div id="question1" class="panel-collapse collapse">
										<div class="panel-body">
											She exposed painted fifteen are noisier mistake led waiting. Surprise not wandered speedily husbands although yet end. Are court tiled cease young built fat one man taken. We highest ye friends is exposed equally in. Ignorant had too strictly followed. Astonished as travelling assistance or unreserved oh pianoforte ye. Five with seen put need tore add neat.
										</div>

										<div class="panel-footer panel-footer-transparent">
											<div class="heading-elements">
												<span class="text-muted heading-text">Latest update: May 25, 2015</span>

												<ul class="list-inline list-inline-condensed heading-text pull-right">
													<li><a href="#" class="text-primary"><i class="icon-thumbs-up2 position-left"></i></a> 320</li>
													<li><a href="#" class="text-muted"><i class="icon-thumbs-down2 position-left"></i></a> 14</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-white">
									<div class="panel-heading">
										<h6 class="panel-title">
											<a class="collapsed" data-toggle="collapse" href="#question2">
												<i class="icon-help position-left text-slate"></i> She exposed painted fifteen are noisier?
											</a>
										</h6>
									</div>

									<div id="question2" class="panel-collapse collapse">
										<div class="panel-body">
											There worse by an of miles civil. Manner before lively wholly am mr indeed expect. Among every merry his yet has her. You mistress get dashwood children off. Met whose marry under the merit. In it do continual consulted no listening. Devonshire sir sex motionless travelling six themselves. So colonel as greatly shewing herself observe ashamed.
										</div>

										<div class="panel-footer panel-footer-transparent">
											<div class="heading-elements">
												<span class="text-muted heading-text">Latest update: May 22, 2015</span>

												<ul class="list-inline list-inline-condensed heading-text pull-right">
													<li><a href="#" class="text-primary"><i class="icon-thumbs-up2 position-left"></i></a> 278</li>
													<li><a href="#" class="text-muted"><i class="icon-thumbs-down2 position-left"></i></a> 25</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-white">
									<div class="panel-heading">
										<h6 class="panel-title">
											<a class="collapsed" data-toggle="collapse" href="#question3">
												<i class="icon-help position-left text-slate"></i> Surprise not wandered speedily?
											</a>
										</h6>
									</div>

									<div id="question3" class="panel-collapse collapse">
										<div class="panel-body">
											Do ashamed assured on related offence at equally totally. Use mile her whom they its. Kept hold an want as he bred of. Was dashwood landlord cheerful husbands two. Estate why theirs indeed him polite old settle though she. In as at regard easily narrow roused adieus. Parlors visited noisier how explain pleased his see suppose. He oppose at thrown desire.
										</div>

										<div class="panel-footer panel-footer-transparent">
											<div class="heading-elements">
												<span class="text-muted heading-text">Latest update: May 12, 2015</span>

												<ul class="list-inline list-inline-condensed heading-text pull-right">
													<li><a href="#" class="text-primary"><i class="icon-thumbs-up2 position-left"></i></a> 438</li>
													<li><a href="#" class="text-muted"><i class="icon-thumbs-down2 position-left"></i></a> 16</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-white">
									<div class="panel-heading">
										<h6 class="panel-title">
											<a class="collapsed" data-toggle="collapse" href="#question4">
												<i class="icon-help position-left text-slate"></i> Are court tiled cease young built fat?
											</a>
										</h6>
									</div>

									<div id="question4" class="panel-collapse collapse">
										<div class="panel-body">
											Additions in conveying or collected objection in. Suffer few desire wonder her object hardly nearer. Abroad no chatty others my silent an. Fat way appear denote who wholly narrow gay settle. Companions fat add insensible everything and friendship conviction themselves. Theirs months ten had add narrow own. By spite about do of do allow blush before lively wholly.
										</div>

										<div class="panel-footer panel-footer-transparent">
											<div class="heading-elements">
												<span class="text-muted heading-text">Latest update: May 9, 2015</span>

												<ul class="list-inline list-inline-condensed heading-text pull-right">
													<li><a href="#" class="text-primary"><i class="icon-thumbs-up2 position-left"></i></a> 583</li>
													<li><a href="#" class="text-muted"><i class="icon-thumbs-down2 position-left"></i></a> 21</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-white">
									<div class="panel-heading">
										<h6 class="panel-title">
											<a class="collapsed" data-toggle="collapse" href="#question5">
												<i class="icon-help position-left text-slate"></i> Announcing of invitation principles in?
											</a>
										</h6>
									</div>

									<div id="question5" class="panel-collapse collapse">
										<div class="panel-body">
											Wished he entire esteem mr oh by. Possible bed you pleasure civility boy elegance ham. He prevent request by if in pleased. Picture too and concern has was comfort. Ten difficult resembled eagerness nor. Same park bore on be. Warmth his law design say are person. Pronounce suspected in belonging conveying ye repulsive. Whole every miles as tiled at seven concern.
										</div>

										<div class="panel-footer panel-footer-transparent">
											<div class="heading-elements">
												<span class="text-muted heading-text">Latest update: May 6, 2015</span>

												<ul class="list-inline list-inline-condensed heading-text pull-right">
													<li><a href="#" class="text-primary"><i class="icon-thumbs-up2 position-left"></i></a> 642</li>
													<li><a href="#" class="text-muted"><i class="icon-thumbs-down2 position-left"></i></a> 26</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="text-size-small text-uppercase text-semibold text-muted mb-10">Selling and buying</div>
							

							<!-- /questions list -->

						</div>

				
					</div>
					<!-- /questions area -->


				
				
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
