<?php global $host ?>
<!DOCTYPE html>
<html>
    
<!-- Mirrored from hubancreative.com/projects/templates/coco/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 May 2015 22:51:02 GMT -->
<head>
        <meta charset="UTF-8">
        <title>Login | ISMG </title>   
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
                <link href="<?php echo $host?>/site/assets/css/style.css" rel="stylesheet" type="text/css" />
                <!-- Extra CSS Libraries End -->
        <link href="<?php echo $host?>/site/assets/css/style-responsive.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="<?php echo $host?>/site/https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="<?php echo $host?>/site/https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
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
    </head>
    <body class="fixed-left login-page">
        <!-- Modal Start -->
			
	<!-- Begin page -->
	<div class="container">
		<div class="full-content-center">
			<h2 class="text-center"><a href="#"><b>ISMG</b></a></h2>
			<div class="login-wrap animated flipInX">
				<div class="login-block">
					<img src="<?php echo $host?>/site/images/users/default-user.png" class="img-circle not-logged-avatar">
					<?php 
					    if (isset($info)) {
					        # code...
					        echo $info;
					    }

					?>
					<form role="form" action="<?php echo $host?>/dashboard" method="post">
						<div class="form-group login-input">
						<i class="fa fa-user overlay"></i>
						<input type="text" class="form-control text-input" name="username" placeholder="Username" required>
						</div>
						<div class="form-group login-input">
						<i class="fa fa-key overlay"></i>
						<input type="password" class="form-control text-input" name="password" placeholder="********" required>
						</div>
						
						<div class="row">
							<div class="col-sm-6">
							<button type="submit" name="loginBtn" class="btn btn-success btn-block">LOGIN</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
	<!-- the overlay modal element -->
	<div class="md-overlay"></div>
	<!-- End of eoverlay modal -->
	<script>
		var resizefunc = [];
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo $host?>/site/assets/libs/jquery/jquery-1.11.1.min.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/jquery-ui-touch/jquery.ui.touch-punch.min.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/jquery-detectmobile/detect.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/jquery-animate-numbers/jquery.animateNumbers.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/ios7-switch/ios7.switch.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/fastclick/fastclick.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/jquery-blockui/jquery.blockUI.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/bootstrap-bootbox/bootbox.min.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/jquery-slimscroll/jquery.slimscroll.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/jquery-sparkline/jquery-sparkline.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/nifty-modal/js/classie.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/nifty-modal/js/modalEffects.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/sortable/sortable.min.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/bootstrap-fileinput/bootstrap.file-input.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/bootstrap-select2/select2.min.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/magnific-popup/jquery.magnific-popup.min.js"></script> 
	<script src="<?php echo $host?>/site/assets/libs/pace/pace.min.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="<?php echo $host?>/site/assets/libs/jquery-icheck/icheck.min.js"></script>

	<!-- Demo Specific JS Libraries -->
	<script src="<?php echo $host?>/site/assets/libs/prettify/prettify.js"></script>

	<script src="<?php echo $host?>/site/assets/js/init.js"></script>
	</body>

<!-- Mirrored from hubancreative.com/projects/templates/coco/default/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 20 May 2015 22:51:03 GMT -->
</html>