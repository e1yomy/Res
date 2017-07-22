(function(){
	var app=angular.module('pagina',[]);
	app.directive('menu',function(){
		return{
			restrict:'E',
			templateUrl:'menu.html'
		};
	});
});

