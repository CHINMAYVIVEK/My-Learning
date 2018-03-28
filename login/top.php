
<?php
include 'session.php';
 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - My Learning</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

                
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
                

		<!-- ace settings handler -->
              
                <script src="assets/js/ace-extra.min.js"></script>
                

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="no-skin">
<div id="navbar" class="navbar navbar-default">
  <script type="text/javascript">
    try{ace.settings.check('navbar' , 'fixed')}catch(e){}
  </script>

  <div class="navbar-container" id="navbar-container">
    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
      <span class="sr-only">Toggle sidebar</span>

      <span class="icon-bar"></span>

      <span class="icon-bar"></span>

      <span class="icon-bar"></span>
    </button>

    <div class="navbar-header pull-left">
      <a href="index.html" class="navbar-brand">
        <small>
          <i class="fa fa-leaf"></i>
          My Learning
        </small>
      </a>
    </div>

    <div class="navbar-buttons navbar-header pull-right" role="navigation">
      <ul class="nav ace-nav">

        <li class="light-blue">
          <a data-toggle="dropdown" href="#" class="dropdown-toggle">
            <img class="nav-user-photo" src="assets/avatars/user.jpg" alt="<?php echo "$ad_name"; ?>" />
            <span class="user-info">
              <small>Welcome,</small>
              <?php echo "$ad_name"; ?>
            </span>

            <i class="ace-icon fa fa-caret-down"></i>
          </a>

          <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

            <li>
              <a href="profile.php?id=$id">
                <i class="ace-icon fa fa-user"></i>
                Profile
              </a>
            </li>

            <li class="divider"></li>

            <li>
              <a href="logout.php">
                <i class="ace-icon fa fa-power-off"></i>
                Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /.navbar-container -->
</div>
