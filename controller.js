var simplemodule =  angular.module('docsSimpleDirective', ['ngRoute']);
//defining the configuration
simplemodule.config(function ($routeProvider){
    $routeProvider.when( '/view1',
	     {
		  controller: 'test',
		  templateUrl: 'view1.html'
		 })
	.when('/view2',
          {
		  controller: 'test',
		  templateUrl: 'view2.html'
          })
	.otherwise(
	     {
		  redirectTo: '/view1'
	     });	  
  });
    simplemodule.controller('test', function($scope) {
       $scope.users = [{name:'abhi', city:'patna'},{name:'yogi', city:'moradabad'},{name:'prem', city:'bulandsher'}];
	   //adding new customer at this view.
	   $scope.addCustomer = function() {
		 $scope.users.push({name: $scope.newCustomer.name2, city: $scope.newCustomer.city2});
       };
  });


  
