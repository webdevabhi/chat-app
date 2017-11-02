app.controller('ChatController', function($scope, ChatService, $location, $rootScope){
	$scope.user = $rootScope.user;

	$scope.conn = new WebSocket("ws://" + Broadcast.BROADCAST_URL + ":" + Broadcast.BROADCAST_PORT);

	$scope.conn.onopen = function(e) {
		console.log("Connection established");
		$scope.conn.send("msg test from a browser client");
	}

	$scope.conn.onmessage = function(e) {
		console.log(e.data);
	}
});