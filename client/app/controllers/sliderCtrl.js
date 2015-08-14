'use strict';

App.controller('SliderCtrl', ['$scope', function($scope) {

	$scope.slides = [
		{image: 'http://apollo-na-uploads.s3.amazonaws.com/1433523131/memes_that_are_both_funny_and_insulting_at_the_same_time_640_02.jpg', description: 'Image 0s0'},
		{image: 'http://files.mom.me/photos/2014/08/01/6-74677-mm_babymeme3-1406927575.jpg', description: 'Image 01'},
		{image: 'http://cdn.ebaumsworld.com/thumbs/picture/166932/82598897.jpg', description: 'Image 02'},
		{image: 'http://data.whicdn.com/images/35682353/meme-simply-2_large.jpg', description: 'Image 03'},
		{image: 'http://cdn.pophangover.com/wp-content/uploads/2013/12/mem2.png', description: 'Image 04'}
	];

		$scope.direction = 'left';
		$scope.currentIndex = 0;

		$scope.setCurrentSlideIndex = function (index) {
			$scope.direction = (index > $scope.currentIndex) ? 'left' : 'right';
			$scope.currentIndex = index;
		};

		$scope.isCurrentSlideIndex = function (index) {
			return $scope.currentIndex === index;
		};

		$scope.prevSlide = function () {
			$scope.direction = 'left';
			console.log("hello left");
			$scope.currentIndex = ($scope.currentIndex < $scope.slides.length - 1) ? ++$scope.currentIndex : 0;
		};

		$scope.nextSlide = function () {
			$scope.direction = 'right';
			console.log("right");
			$scope.currentIndex = ($scope.currentIndex > 0) ? --$scope.currentIndex : $scope.slides.length - 1;
		};
	}])
	.animation('.slide-animation', function () {
		return {
			beforeAddClass: function (element, className, done) {
				var scope = element.scope();

				if (className == 'ng-hide') {
					var finishPoint = element.parent().width();
					if(scope.direction !== 'right') {
						finishPoint = -finishPoint;
					}
					TweenMax.to(element, 0.1, {left: finishPoint, onComplete: done });
				}
				else {
					done();
				}
			},
			removeClass: function (element, className, done) {
				var scope = element.scope();

				if (className == 'ng-hide') {
					element.removeClass('ng-hide');

					var startPoint = element.parent().width();
					if(scope.direction === 'right') {
						startPoint = -startPoint;
					}

					TweenMax.fromTo(element, 0.5, { left: startPoint }, {left: 0, onComplete: done });
				}
				else {
					done();
				}
			}
		};
	});
