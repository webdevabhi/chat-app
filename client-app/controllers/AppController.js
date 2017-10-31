app.controller('AppController', function($scope,$http, ChatService, $location){

	$scope.pools = [];

	// console.log(sessionStorage.getItem('token'));
	/*if (sessionStorage.getItem('token')) {
		console.log('hi');
		$location.path( "/chat-rooms" );
	}*/

	$scope.doRegistration = function(form) {
		if (form.$valid) {
			// console.log($scope.user);
			ChatService.login($scope.userName).then(userData => {
				if (userData.data.token) {
					sessionStorage.setItem('token', userData.data.token);
					sessionStorage.setItem('expireAt', userData.data.expire_at);
					$location.path( "/chat-rooms" );
				}
			}, error => {
				console.log(error);
			});
		}
	}

});