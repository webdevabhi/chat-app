app.controller('AppController', function($scope,$http, ChatService, $location){

	$scope.isOnline = false;
	$scope.user = '';
	

	$scope.doRegistration = function(form) {
		if (form.$valid) {
			console.log($scope.userName);
			ChatService.login($scope.userName).then(userData => {

				if (userData.data.status == 201) {
					$scope.isOnline = true;
					$scope.user = userData.data.userName;

					$scope.conn = new WebSocket("ws://" + Broadcast.BROADCAST_URL + ":" + Broadcast.BROADCAST_PORT);

					

					console.log($scope.conn);

					$scope.conn.onopen = function(e) {
						console.log("Connection established");
						$scope.conn.send("msg test from a browser client");
					}

					$scope.conn.onmessage = function(e) {
						console.log(e.data);
					}
				}
			}, error => {
				console.log(error);
			});
		}
	}

});




// app.controller('AppController', function($scope,$http, ChatService, $location){

// 	$scope.isOnline = false;
// 	$scope.user = '';
// 	$scope.usersToken = '';
// 	$scope.activeUsers = [];

// 	$scope.getActiveUsers = function() {
// 		ChatService.getActiveUsers().then(activeUsers => {
// 			$scope.activeUsers = activeUsers.data;
// 		}, error=> {
// 			console.log(error);
// 		});
// 	}

// 	if (sessionStorage.getItem('token')) {
// 		$scope.isOnline = true;
// 		$scope.user = sessionStorage.getItem('userName');
// 		$scope.getActiveUsers();
// 	}
	
// 	window.setInterval(function(){
// 		$scope.getActiveUsers();
// 	}, 10000);

// 	$scope.doRegistration = function(form) {
// 		if (form.$valid) {
// 			console.log($scope.userName);
// 			ChatService.login($scope.userName).then(userData => {

// 				if (userData.data.status == 201) {
// 					$scope.isOnline = true;
// 					$scope.user = userData.data.userName;
// 					$scope.usersToken = userData.data.userName;
// 					sessionStorage.setItem('token', userData.data.token);
// 					sessionStorage.setItem('userName', userData.data.userName);
// 					$scope.getActiveUsers();
// 				}
// 			}, error => {
// 				console.log(error);
// 			});
// 		}
// 	}

// 	$scope.startChat = function(token) {
// 		console.log(token);
// 	}

// });