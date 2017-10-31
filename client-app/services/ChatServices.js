app.factory('ChatService', ['$http','$window', '$rootScope', function($http) {

	return {
		login : function(userName) {
			var data = "name=" + encodeURIComponent(userName)
			console.log(data);
			// $http.default.headers.common.
			return $http.post("http://localhost/chat-app/api/saveUser", data, {'headers' : {"Content-Type" : "application/x-www-form-urlencoded"}});
		}
	};

}]);