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
						console.log(e); // Checking the msg received by that particular user only.
						// Unable to list messages in the selected users chat box.
						// I Tried alot but unable to achive a private chat room in websocket.
						
						var messageList = angular.element( document.querySelector( '#message-list' ) );
						messageList.prepend('<li style="text-align: left;padding: 15px;width: 100%;border-bottom: 1px solid #000000;">'+e.data+'</li>');
					}
				}
			}, error => {
				console.log(error);
			});
		}
	}

	//Subscribe to a particular User.
	$scope.subscribe = function(channel) {
		$scope.isStartedChat = true;
		$scope.isActiveChat = channel;

	    $rootScope.conn.send(JSON.stringify({command: "subscribe", channel: channel}));
	}

	// Send Msg to the Particular User.
	$scope.sendMessage = function(msg) {
		var messageList = angular.element( document.querySelector( '#message-list' ) );
		messageList.prepend('<li style="text-align: right;padding: 10px;width: 100%;border-bottom: 1px solid #000000;">'+$scope.msg+'</li>');
	    $rootScope.conn.send(JSON.stringify({command: "message", message: $scope.msg}));
	    $scope.msg = '';
	}

});