 var simplemodule =  angular.module('docsSimpleDirective', []);
  simplemodule.controller('Ctrl', function($scope) {
    $scope.customer = {
      name: 'Naomi',
      address: '1600 Amphitheatre'
    };
  });
  simplemodule.directive('myCustomers', function() {
    return {
	  restrict: 'E',
      template: 'Name: {{customer.name}} Address: {{customer.address}}'
    };
  });