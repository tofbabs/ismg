<?php global $host; ?>
<!DOCTYPE html>
<html>
    
<!-- Mirrored from hubancreative.com/projects/templates/coco/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 May 2015 22:51:10 GMT -->
<head>
        <meta charset="UTF-8">
        <title><?php echo $title ?> | ISMG </title>   
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="description" content="">
        <meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
        <meta name="author" content="Huban Creative">

        <!-- Base Css Files -->
        <link href="<?php echo $host?>/site/assets/libs/jqueryui/ui-lightness/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" />
        <link href="<?php echo $host?>/site/assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $host?>/site/assets/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?php echo $host?>/site/assets/libs/fontello/css/fontello.css" rel="stylesheet" />
        <link href="<?php echo $host?>/site/assets/libs/animate-css/animate.min.css" rel="stylesheet" />
        <link href="<?php echo $host?>/site/assets/libs/nifty-modal/css/component.css" rel="stylesheet" />
        <link href="<?php echo $host?>/site/assets/libs/magnific-popup/magnific-popup.css" rel="stylesheet" /> 
        <link href="<?php echo $host?>/site/assets/libs/ios7-switch/ios7-switch.css" rel="stylesheet" /> 
        <link href="<?php echo $host?>/site/assets/libs/pace/pace.css" rel="stylesheet" />
        <link href="<?php echo $host?>/site/assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" />
        <link href="<?php echo $host?>/site/assets/libs/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" />
        <link href="<?php echo $host?>/site/assets/libs/jquery-icheck/skins/all.css" rel="stylesheet" />
        <!-- Code Highlighter for Demo -->
        <link href="<?php echo $host?>/site/assets/libs/prettify/github.css" rel="stylesheet" />
        
                <!-- Extra CSS Libraries Start -->
                <link href="<?php echo $host?>/site/assets/libs/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo $host?>/site/assets/libs/morrischart/morris.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo $host?>/site/assets/libs/jquery-jvectormap/css/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo $host?>/site/assets/libs/jquery-clock/clock.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo $host?>/site/assets/libs/bootstrap-calendar/css/bic_calendar.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo $host?>/site/assets/libs/sortable/sortable-theme-bootstrap.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo $host?>/site/assets/libs/jquery-weather/simpleweather.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo $host?>/site/assets/libs/bootstrap-xeditable/css/bootstrap-editable.css" rel="stylesheet" type="text/css" />
                <link href="<?php echo $host?>/site/assets/css/style.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->
        <link href="<?php echo $host?>/site/assets/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <link rel="shortcut icon" href="<?php echo $host?>/site/assets/img/favicon.ico">
        <link rel="apple-touch-icon" href="<?php echo $host?>/site/assets/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $host?>/site/assets/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $host?>/site/assets/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $host?>/site/assets/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $host?>/site/assets/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $host?>/site/assets/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $host?>/site/assets/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $host?>/site/assets/img/apple-touch-icon-152x152.png" />
        
        <script src="<?php echo $host?>/site/assets/libs/jquery/jquery-1.11.1.min.js"></script>
        <script src="<?php echo $host?>/site/assets/libs/raphael/raphael-min.js"></script>
        <script src="<?php echo $host?>/site/assets/libs/morrischart/morris.min.js"></script>

    </head>
    <body class="fixed-left">
        <!-- Modal Start -->
		
	<!-- Modal Logout -->
	<div class="md-modal md-just-me" id="logout-modal">
		<div class="md-content">
			<h3><strong>Logout</strong> Confirmation</h3>
			<div>
				<p class="text-center">Are you sure want to logout from this awesome system?</p>
				<p class="text-center">
				<button class="btn btn-danger md-close">Nope!</button>
				<a href="<?php echo $host?>/login" class="btn btn-success md-close">Yeah, I'm sure</a>
				</p>
			</div>
		</div>
	</div>        <!-- Modal End -->	
	<!-- Begin page -->
	<div id="wrapper">
		
<!-- Top Bar Start -->
<div class="topbar">
    <div class="topbar-left">
        <div class="logo">
            <h1><a href="#">ISMG</a></h1>
        </div>
        <button class="button-menu-mobile open-left">
        <i class="fa fa-bars"></i>
        </button>
    </div>
    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-collapse2">
                <ul class="nav navbar-nav navbar-right top-navbar">

                    <li class="dropdown iconify hide-phone"><a href="#" onclick="javascript:toggle_fullscreen()"><i class="icon-resize-full-2"></i></a></li>
                    <li class="dropdown topbar-profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="rounded-image topbar-profile-image"><img src="<?php echo $host?>/site/images/users/user-35.jpg"></span> <strong>Admin</strong> <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $host?>/user/edit/admin">Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="icon-help-2"></i> Help</a></li>
                            <li><a class="md-trigger" data-modal="logout-modal"><i class="icon-logout-1"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>
<!-- Top Bar End -->
		    <!-- Left Sidebar Start -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <!--- Profile -->
                <div class="profile-info">
                    <div class="col-xs-4">
                      <a href="#" class="rounded-image profile-image"><img src="<?php echo $host?>/site/images/users/user-100.jpg"></a>
                    </div>
                    <div class="col-xs-8">
                        <div class="profile-text">Welcome <b>Admin</b></div>
                        <div class="profile-buttons text-center">
                          <a href="<?php echo $host?>/shutdown" title="Sign Out"><i class="fa fa-power-off text-red-1"></i></a>
                        </div>
                    </div>
                </div>
                <!--- Divider -->
                <div class="clearfix"></div>
                <hr class="divider" />
                <div class="clearfix"></div>
                <!--- Divider -->
                <div id="sidebar-menu">
                    <ul>
                        <li ><a href='<?php echo $host?>/dashboard' class="<?php echo ($title == 'Dashboard') ? 'active' : null ?>" href='javascript:void(0);'><i class='icon-home-3'></i><span>Dashboard</span> <span class="pull-right"></span></a></li>

                        <li><a class="<?php echo ($title == 'User') ? 'active' : null ?>" href='javascript:void(0);'><i class='icon-user'></i><span>Profiles</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <li><a href='<?php echo $host?>/user/add'><span>Add New</span></a></li>
                                <li><a href='<?php echo $host?>/user'><span>View All</span></a></li>
                            </ul>
                        </li>

                        <li><a class="<?php echo ($title == 'Campaign') ? 'active' : null ?>" href='javascript:void(0);'><i class='fa fa-bullhorn'></i><span>Campaign</span> <span class="pull-right"><i class="fa fa-angle-down"></i></span></a>
                            <ul>
                                <li><a href='<?php echo $host?>/campaign/single'><span>Single</span></a></li>
                                <li><a href='<?php echo $host?>/campaign/'><span>Bulk</span></a></li>
                            </ul>
                        </li>

                        <li><a href='<?php echo $host?>/bind' class="<?php echo ($title == 'Bind') ? 'active' : null ?>" href='javascript:void(0);'><i class='fa fa-arrows-h'></i><span>SMSC Binds</span></a>
                        </li>

                        <li><a href='<?php echo $host?>/log' class="<?php echo ($title == 'Log') ? 'active' : null ?>" ><i class='fa fa-bar-chart '></i><span>Gateway Log</span></a>
                        </li>

                    </ul>                    
                    <div class="clearfix"></div>
                </div>

            <div class="clearfix"></div><br><br><br>
        </div>
        </div>
        <!-- Left Sidebar End -->	