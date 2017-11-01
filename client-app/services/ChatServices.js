app.factory('ChatService', ['$http','$window', '$rootScope', function($http) {

	return {
		login : function(userName) {
			var data = "name=" + encodeURIComponent(userName)
			// $http.default.headers.common.
			console.log(data);
			return $http.post(BASE_URL+"api/saveUser", data, {'headers' : {"Content-Type" : "application/x-www-form-urlencoded"}});
		},

		getActiveUsers : function() {
			return $http.get(BASE_URL+"api/getActiveUsers");
		}
	};

}]);