app.controller('AppController', function($scope,$http, ChatService){

	$scope.pools = [];

	console.log(sessionStorage.getItem('token'));

	$scope.doRegistration = function(form) {
		if (form.$valid) {
			// console.log($scope.user);
			ChatService.login($scope.userName).then(userData => {
				if (userData.data.token) {
					sessionStorage.setItem('token', userData.data.token);
					sessionStorage.setItem('expireAt', userData.data.expire_at);
				}
			}, error => {
				console.log(error);
			});
		}
	}

});