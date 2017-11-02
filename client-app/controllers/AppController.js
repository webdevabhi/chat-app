app.controller('AppController', function($scope,$http, ChatService, $location, $rootScope){

	$scope.isOnline = false;
	$scope.isStartedChat = false;
	$scope.user = '';
	$scope.token = '';
	$scope.activeUsers = [];

	$scope.getActiveUsers = function() {
		ChatService.getActiveUsers().then(activeUsers => {
			$scope.activeUsers = activeUsers.data;
		}, error=> {
			console.log(error);
		});
	}

	window.setInterval(function(){
		$scope.getActiveUsers();
	}, 10000);

	$scope.doRegistration = function(form) {
		if (form.$valid) {
			ChatService.login($scope.userName).then(userData => {
				if (userData.data.status == 201) {
					$scope.isOnline = true;
					$scope.user = userData.data.userName;
					$scope.token = userData.data.token;
					$scope.getActiveUsers();

					$rootScope.conn = new WebSocket("ws://" + Broadcast.BROADCAST_URL + ":" + Broadcast.BROADCAST_PORT);

					$rootScope.conn.onopen = function(e) {
						console.log("Connection established");
					}

					$rootScope.conn.onmessage = function(e) {
						var messageList = angular.element( document.querySelector( '#message-list' ) );
						messageList.prepend('<li style="text-align: left;padding: 15px;width: 100%;border-bottom: 1px solid #000000;">'+e.data+'</li>');
					}
				}
			}, error => {
				console.log(error);
			});
		}
	}

	$scope.subscribe = function(channel) {
		$scope.isStartedChat = true;
		$scope.isActiveChat = channel;

		angular.forEach(angular.element('#message-list'),function(value,key){
			var data = angular.element(value);
			data.remove();
		});

	    $rootScope.conn.send(JSON.stringify({command: "subscribe", channel: channel}));
	}

	$scope.sendMessage = function(msg) {
		var messageList = angular.element( document.querySelector( '#message-list' ) );
		messageList.prepend('<li style="text-align: right;padding: 10px;width: 100%;border-bottom: 1px solid #000000;">'+msg+'</li>');
	    $rootScope.conn.send(JSON.stringify({command: "message", message: msg}));
	}

});