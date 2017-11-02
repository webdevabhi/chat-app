<html lang="en">
<head>
	<title>Chat Room</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" href="<?=base_url()?>assest/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assest/css/custom.css">
</head>
<body ng-app="main-App">

	<ng-view></ng-view>

	<script type="text/javascript">
  		var BASE_URL = "<?php echo base_url(); ?>";
  		var Broadcast = {
  			POST : "<?php echo POST; ?>",
  			BROADCAST_URL : "<?php echo BROADCAST_URL; ?>",
  			BROADCAST_PORT : "<?php echo BROADCAST_PORT; ?>",
  		};
  	</script>

	<script src="<?=base_url()?>assest/js/jquery.min.js"></script>
	<script src="<?=base_url()?>assest/js/bootstrap.min.js"></script>
	<!-- Angular JS -->
	<script src="<?=base_url()?>assest/js/angular.min.js"></script>  
	<script src="<?=base_url()?>assest/js/angular-route.min.js"></script>
	<!-- MY App -->
	<script src="<?=base_url()?>client-app/routes.js"></script>

	<!-- Controllers -->
	<script src="<?=base_url()?>client-app/controllers/AppController.js"></script>

	<!-- Services -->
	<script src="<?=base_url()?>client-app/services/ChatServices.js"></script>
</body>
</html>