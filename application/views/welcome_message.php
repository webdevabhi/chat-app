<html lang="en">
<head>
	<title>Codeigniter 3</title>
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?=base_url()?>assest/css/bootstrap.min.css">
</head>
<body ng-app="main-App">
	<!-- <nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Codeigniter 3</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="#/">Home</a></li>
					<li><a href="#/items">Item</a></li>
				</ul>
			</div>
		</div>
	</nav> -->
	<div class="container">
		<ng-view></ng-view>
	</div>

	<script src="<?=base_url()?>assest/js/jquery.min.js"></script>
	<script src="<?=base_url()?>assest/js/bootstrap.min.js"></script>
	<!-- Angular JS -->
	<script src="<?=base_url()?>assest/js/angular.min.js"></script>  
	<script src="<?=base_url()?>assest/js/angular-route.min.js"></script>
	<!-- MY App -->
	<script src="app/routes.js"></script>
	<script src="app/services/myServices.js"></script>
	<!-- <script src="app/helper/myHelper.js"></script> -->
	<!-- App Controller -->
	<script src="app/controllers/AppController.js"></script>
</body>
</html>