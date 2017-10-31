app.controller('ChatController', function($scope, ChatService, $location){

	if (!sessionStorage.getItem('token')) {
		$location.path( "/" );
	}
});