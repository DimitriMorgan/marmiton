'use strict';

App.controller('NewRecipeCtrl', ['$scope', '$routeParams', '$filter', '$http', function($scope, $routeParams, $filter, $http) {

	$scope.starters = {
		tag: null,
		ing_name: null,
		ing_amount: null,
		units: "Measuring Unit"
	};

	$scope.form = {
		tags: [],
		ingredients: [],

	};

	$scope.units = [{
		id: 1,
		name: "Pint"
	}, {
		id: 2,
		name: "Gallon"
	}, {
		id: 3,
		name: "Litre"
	}, {
		id: 4,
		name: "Microgram"
	}, {
		id: 5,
		name: "Milligram"
	}, {
		id: 6,
		name: "Gram"
	}, {
		id: 7,
		name: "Kilogram"
	}];

	$scope.selectMeasureUnit = function(chosenUnit) {
		if($scope.starters.ing_name && $scope.starters.ing_amount) {
			$scope.form.ingredients.push({
				amount: $scope.starters.ing_amount,
				name: $scope.starters.ing_name,
				unit: chosenUnit
			});
			$scope.starters.ing_name = null;
			$scope.starters.ing_amount = null;
			$scope.starters.units = "Measuring Unit";
		}
	};

	$scope.addTags = function() {
		if($scope.starters.tag) {
			$scope.form.tags.push($scope.starters.tag);
			$scope.starters.tag = null;
		}
	};

}]);


App.controller('MyCtrl', ['$scope', 'Upload', function ($scope, Upload) {
	$scope.$watch('file', function (file) {
		$scope.upload($scope.file);
	});

	/* optional: set default directive values */
	//Upload.setDefaults( {ngf-keep:false ngf-accept:'image/*', ...} );

	$scope.upload = function (file) {
		Upload.upload({
			url: 'client/assets',
			fields: {'username': $scope.username},
			file: file
		}).progress(function (evt) {
			var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
			console.log('progress: ' + progressPercentage + '% ' + evt.config.file.name);
		}).success(function (data, status, headers, config) {
			console.log('file ' + config.file.name + 'uploaded. Response: ' + data);
		}).error(function (data, status, headers, config) {
			console.log('error status: ' + status);
		})
	};
}]);
