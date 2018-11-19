var app = angular.module("queueboardApp",["firebase"]);


	app.controller("queueboard", function($scope, $firebaseArray) {
		
		var ref  = new Firebase("https://dazzling-torch-589.firebaseio.com/queue");
		
			$scope.queuelist = $firebaseArray(ref);
			$scope.counter = 0;
			
	});