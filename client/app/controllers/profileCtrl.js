'use strict';

App.controller('ProfileCtrl', ['$scope', '$routeParams', '$filter', '$http', function($scope, $routeParams, $filter, $http) {

    // Get selected recipe by id
    $scope.recipe = {
        id: $routeParams.recipeId,
        tags: "tagss",
        name: "Sleepy omelet bear",
        picture_src: "client/assets/images/food-art2.jpg",
        description: "Haec igitur prima lex amicitiae sanciatur, ut ab amicis honesta petamus, amicorum causa honesta faciamus, ne exspectemus quidem, dum rogemur; studium semper adsit, cunctatio absit; consilium vero dare audeamus libere. Plurimum in amicitia amicorum bene suadentium valeat auctoritas, eaque et adhibeatur ad monendum non modo aperte sed etiam acriter, si res postulabit, et adhibitae pareatur."
    };

    $scope.videoDefaultSettings = {
        nativeControls: true,
        theme: "http://www.videogular.com/styles/themes/default/latest/videogular.css"
    };

    $scope.kitchenMode = false;

    $scope.toggleMode = function() {
        $scope.kitchenMode = !$scope.kitchenMode;
    };

    function totalRating(comments) {
        var sumFive = 5 * $filter('filter')(comments, {rating: 5}).length,
            sumFour = 4 * $filter('filter')(comments, {rating: 4}).length,
            sumThree = 3 * $filter('filter')(comments, {rating: 3}).length,
            sumTwo = 2 * $filter('filter')(comments, {rating: 2}).length,
            sumOne = 1 * $filter('filter')(comments, {rating: 1}).length;

        $scope.recipeMap.avgRating = Math.round((sumFive + sumFour + sumThree + sumTwo + sumOne)/comments.length);
    }

    $scope.recipeMap = {
        id: $routeParams.recipeId,
        author: "chuana_m",
        author_mail: "chuana_m@etna-alternance.net",
        title: "Brioche Burger Buns",
        dish_type: "Burgers",
        created_at: moment().format("MMM Do YY"),
        updated_at: Date.now(),
        rating: 2,
        picture: {
            picture_id: Math.random().toString(16).slice(2, 8),
            picture_recipe_id: $routeParams.recipeId,
            picture_name: "brioche_burger_buns",
            picture_src: "client/assets/recipes/brioche_burger_buns/BurgerBuns_4up.jpg"
            //picture_src: "client/assets/images/food-art2.jpg"
        },
        recipe_tag: [
            {
                recipe_tag_id: $routeParams.recipeId,
                tag: {
                    tag_id: Math.random().toString(16).slice(2, 8),
                    tag_recipe_id: $routeParams.recipeId,
                    tag_name: "Easy"
                }
            },
            {
                recipe_tag_id: $routeParams.recipeId,
                tag: {
                    tag_id: Math.random().toString(16).slice(2, 8),
                    tag_recipe_id: $routeParams.recipeId,
                    tag_name: "Easy"
                }
            },
            {
                recipe_tag_id: $routeParams.recipeId,
                tag: {
                    tag_id: Math.random().toString(16).slice(2, 8),
                    tag_recipe_id: $routeParams.recipeId,
                    tag_name: "Easy"
                }
            },
            {
                recipe_tag_id: $routeParams.recipeId,
                tag: {
                    tag_id: Math.random().toString(16).slice(2, 8),
                    tag_recipe_id: $routeParams.recipeId,
                    tag_name: "Easy"
                }
            },
            {
                recipe_tag_id: $routeParams.recipeId,
                tag: {
                    tag_id: Math.random().toString(16).slice(2, 8),
                    tag_recipe_id: $routeParams.recipeId,
                    tag_name: "Easy"
                }
            },
            {
                recipe_tag_id: $routeParams.recipeId,
                tag: {
                    tag_id: Math.random().toString(16).slice(2, 8),
                    tag_recipe_id: $routeParams.recipeId,
                    tag_name: "Easy"
                }
            },
            {
                recipe_tag_id: $routeParams.recipeId,
                tag: {
                    tag_id: Math.random().toString(16).slice(2, 8),
                    tag_recipe_id: $routeParams.recipeId,
                    tag_name: "Baking"
                }
            },
            {
                recipe_tag_id: $routeParams.recipeId,
                tag: {
                    tag_id: Math.random().toString(16).slice(2, 8),
                    tag_recipe_id: $routeParams.recipeId,
                    tag_name: "Baking"
                }
            }
        ],
        recipe_ingredient_quantity: [
            {
                recipe_id: $routeParams.recipeId,
                amount: 360,
                ingredient: {
                    ingredient_id: Math.random().toString(16).slice(2, 8),
                    name: "Egg"
                },
                quantity_unit: {
                    quantity_unit_id: Math.random().toString(16).slice(2, 8),
                    type: "grams"
                }
            },
            {
                recipe_id: $routeParams.recipeId,
                amount: 80,
                ingredient: {
                    ingredient_id: Math.random().toString(16).slice(2, 8),
                    name: "Sugar"
                },
                quantity_unit: {
                    quantity_unit_id: Math.random().toString(16).slice(2, 8),
                    type: "grams"
                }
            },
            {
                recipe_id: $routeParams.recipeId,
                amount: 80,
                ingredient: {
                    ingredient_id: Math.random().toString(16).slice(2, 8),
                    name: "Sugar"
                },
                quantity_unit: {
                    quantity_unit_id: Math.random().toString(16).slice(2, 8),
                    type: "grams"
                }
            },
            {
                recipe_id: $routeParams.recipeId,
                amount: 150,
                ingredient: {
                    ingredient_id: Math.random().toString(16).slice(2, 8),
                    name: "Milk"
                },
                quantity_unit: {
                    quantity_unit_id: Math.random().toString(16).slice(2, 8),
                    type: "grams"
                }
            },
            {
                recipe_id: $routeParams.recipeId,
                amount: 15,
                ingredient: {
                    ingredient_id: Math.random().toString(16).slice(2, 8),
                    name: "Bread machine yeast"
                },
                quantity_unit: {
                    quantity_unit_id: Math.random().toString(16).slice(2, 8),
                    type: "grams"
                }
            },
            {
                recipe_id: $routeParams.recipeId,
                amount: 5,
                ingredient: {
                    ingredient_id: Math.random().toString(16).slice(2, 8),
                    name: "Amylase"
                },
                quantity_unit: {
                    quantity_unit_id: Math.random().toString(16).slice(2, 8),
                    type: "grams"
                }
            },
            {
                recipe_id: $routeParams.recipeId,
                amount: 700,
                ingredient: {
                    ingredient_id: Math.random().toString(16).slice(2, 8),
                    name: "Bread flour"
                },
                quantity_unit: {
                    quantity_unit_id: Math.random().toString(16).slice(2, 8),
                    type: "grams"
                }
            },
            {
                recipe_id: $routeParams.recipeId,
                amount: 200,
                ingredient: {
                    ingredient_id: Math.random().toString(16).slice(2, 8),
                    name: "Butter"
                },
                quantity_unit: {
                    quantity_unit_id: Math.random().toString(16).slice(2, 8),
                    type: "grams"
                }
            },
            {
                recipe_id: $routeParams.recipeId,
                amount: 20,
                ingredient: {
                    ingredient_id: Math.random().toString(16).slice(2, 8),
                    name: "Salt"
                },
                quantity_unit: {
                    quantity_unit_id: Math.random().toString(16).slice(2, 8),
                    type: "grams"
                }
            }
        ],
        steps: [
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Overview",
                visual_type: "vid",
                order: 1,
                visual_src: "https://www.youtube.com/watch?v=2wNtO253Ycs",
                description: "A bun that's rich in flavor, moist, and eggy, while also durable enough to hold up to a big, fat juicy burger."
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Hydrate yeast",
                visual_type: "pic",
                order: 2,
                visual_src: "client/assets/recipes/brioche_burger_buns/Screen Shot 2014-05-12 at 3.59.15 PM.png",
                description: "In the bowl of a stand mixer, combine ingredients and mix on low with a dough hook until the sugar is dissolved and the yeast is completely dispersed. Scrape down the sides of the bowl if necessary. The mixture will have a slightly brownish hue."
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Foil Rings",
                visual_type: "vid",
                order: 3,
                visual_src: "https://www.youtube.com/watch?v=1xvTAeA3MXM",
                sources: [
                    {src: "http://static.videogular.com/assets/videos/videogular.mp4", type: "video/mp4"}
                ],
                description: "In the bowl of a stand mixer, combine ingredients and mix on low with a dough hook until the sugar is dissolved and the yeast is completely dispersed. Scrape down the sides of the bowl if necessary. The mixture will have a slightly brownish hue."
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Add dry ingredients",
                visual_type: "pic",
                order: 4,
                visual_src: "client/assets/recipes/brioche_burger_buns/Screen Shot 2014-05-12 at 4.02.11 PM.png",
                description: "With the mixer still on low, add dry ingredients in small amounts, until evenly dispersed. Continue to mix on low speed. At this point, your dough should be pretty fluid, like a thick cake batter. Don't worry: it will thicken as the starch continues to absorb the water from the milk."
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Add butter; knead 25 minutes",
                visual_type: "pic",
                order: 5,
                visual_src: "client/assets/recipes/brioche_burger_buns/dough-finished.jpg",
                description: "When the dough starts to become firmer and more cohesive, increase to medium speed, add butter, and mix until fully-incorporated. Continue mixing until dough pulls cleanly from sides of the bowl, about 20–25 minutes."
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Rest dough",
                visual_type: "pic",
                order: 6,
                visual_src: "client/assets/recipes/brioche_burger_buns/wrapped-to-fridge.jpg",
                description: "Place the dough in a greased container, spritz with oil, and cover with plastic wrap. Refrigerate until dough is cold. This should take about two hours, depending on your batch size. The dough should be firm and tacky, but not sticky, when you remove it. The point of this step is just to get the dough cold enough to work with, but you can leave it in the fridge for up to 24 hours if you want to divide up the work."
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Portion buns",
                visual_type: "pic",
                order: 7,
                visual_src: "client/assets/recipes/brioche_burger_buns/portion.jpg",
                description: "Working quickly, divide the dough into 80 g portions. (80 g of dough is the correct amount for our 100 mm ring molds—if you wish to make larger or smaller buns, scale the weight accordingly.) We like to use kitchen scissors to speed up this process and keep from warming the dough too much with our hands. If you have more buns than you can bake at one time, reserve the rest of the dough in the fridge while you work batch-by-batch."
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Form buns",
                visual_type: "vid",
                order: 8,
                visual_src: "https://www.youtube.com/watch?v=u2OptU3CBfk",
                description: "The process for forming buns is difficult to describe in words, but easy to understand visually. Watch the video below for detailed guidance. After each bun is formed, transfer quickly to the greased pan, placing each bun in the center of a foil ring. Keep everything loosely covered during this time so dough does not dry out. Once all buns are formed, burst any air bubbles that have formed. Spray lightly with oil and flatten them slightly to make a burger bun shape."
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Proof buns",
                visual_type: "pic",
                order: 9,
                visual_src: "client/assets/recipes/brioche_burger_buns/proof.jpg",
                description: "Proof in a warm room, about 77 °F / 25 °C. Buns are ready to bake when they are just over double in size; this should take about two hours. While your buns are proofing, preheat the oven and prepare your egg wash (steps 9 and 10). "
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Glaze buns with egg wash",
                visual_type: "vid",
                order: 10,
                visual_src: "https://www.youtube.com/watch?v=-IkjLNKwRvg",
                description: "CHEF TIP: An easier way to egg wash is to put the ingredients into a spray bottle, and spritz. If using this method, it may be necessary to thin the wash slightly with a little extra milk. "
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Top 'Em",
                visual_type: "pic",
                order: 11,
                visual_src: "client/assets/recipes/brioche_burger_buns/buns_IMG_1634.jpg",
                description: "After you glaze the buns with egg wash, sprinkle toppings on them, if you wish. Try sesame seeds, poppy seeds, black lava salt, or...?"
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Bake buns",
                visual_type: "pic",
                order: 12,
                visual_src: "client/assets/recipes/brioche_burger_buns/baked.jpg",
                description: "Bake at 347 °F / 175 °C until the buns reach a core temperature of 203 °F / 95 °C, about 10–15 minutes. CHEF TIP: For best results, bake in a very humid environment for the first 3–4 minutes, or until the buns have expanded to the perimeter of the ring molds. You can do this by adding a pan of very hot water to the oven when you put the buns in."
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Visualizing oven spring",
                visual_type: "pic",
                order: 13,
                visual_src: "client/assets/recipes/brioche_burger_buns/BriocheBuns_comparison01.jpg",
                description: "The three buns pictured above demonstrate the effects of oven spring on our brioche. The bun on the left had too much oven spring, and collapsed when it cooled, giving the crust a wrinkled appearance. That oven was probably too humid for too long, so a firm crust never developed. The one on the right didn't get enough oven spring, meaning the oven was probably too hot and dry. That bun will be dense and chewy. The center one is our preference—it rose into a nice dome-shape, but didn't collapse."
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Cool buns; reserve",
                visual_type: "pic",
                order: 14,
                visual_src: "client/assets/recipes/brioche_burger_buns/ziplock_buns.jpg",
                description: "Allow buns to cool before removing the foil rings. For best results, reserve in a ziplock bag for two days before using. This allows the crust to reabsorb moisture from the crumb, giving the whole bun a softer texture. If you like a crisper bun, reserve for two days as described, and then toast."
            },
            {
                step_id: Math.random().toString(16).slice(2, 8),
                step_recipe_id: $routeParams.recipeId,
                step_title: "Make delicious burger",
                visual_type: "pic",
                order: 15,
                visual_src: "client/assets/recipes/brioche_burger_buns/BriocheBuns04.jpg",
                description: "Do it."
            }
        ],
        comments: [
            {
                comment_id: Math.random().toString(16).slice(2, 8),
                comment_recipe_id: $routeParams.recipeId,
                comment_message: "Miam miam !",
                comment_author: "Heisenberg",
                rating: 5
            },
            {
                comment_id: Math.random().toString(16).slice(2, 8),
                comment_recipe_id: $routeParams.recipeId,
                comment_message: "Miam miam !",
                comment_author: "Heisenberg",
                rating: 5
            },
            {
                comment_id: Math.random().toString(16).slice(2, 8),
                comment_recipe_id: $routeParams.recipeId,
                comment_message: "Miam miam !",
                comment_author: "Heisenberg",
                rating: 2
            }
        ]
    };
    totalRating($scope.recipeMap.comments);

    $scope.slides = $filter('filter')($scope.recipeMap.steps, {visual_type: "pic"});
}])
  .directive('customImageSlider', function () {
    return {
        templateUrl: 'client/app/views/sliderImage.html',
        restrict: 'EA',
        scope: {
            pictures: "=?",
            recipeid: "@"
        },
        transclude: true,
        link: function (scope, element, attrs, ctrl, transclude) {
            console.log("recipe id:", scope.recipeid);
            scope.direction = 'left';
            scope.currentIndex = 0;

            scope.setCurrentSlideIndex = function (index) {
                scope.direction = (index > scope.currentIndex) ? 'left' : 'right';
                scope.currentIndex = index;
            };

            scope.isCurrentSlideIndex = function (index) {
                return scope.currentIndex === index;
            };

            scope.prevSlide = function () {
                scope.currentIndex = (scope.currentIndex < scope.pictures.length - 1) ? ++scope.currentIndex : 0;
            };

            scope.nextSlide = function () {
                scope.currentIndex = (scope.currentIndex > 0) ? --scope.currentIndex : scope.slides.length - 1;
            };
        }
    }
  })
  .directive('customTemplateSlider', function () {
      return {
          templateUrl: 'client/app/views/sliderTemplate.html',
          restrict: 'EA',
          scope: {
              steps: "=?",
              recipeid: "@"
          },
          transclude: true,
          link: function (scope, element, attrs, ctrl, transclude) {
              scope.direction = 'left';
              scope.currentIndex = 0;

              scope.setCurrentSlideIndex = function (index) {
                  scope.direction = (index > scope.currentIndex) ? 'left' : 'right';
                  scope.currentIndex = index;
              };

              scope.isCurrentSlideIndex = function (index) {
                  return scope.currentIndex === index;
              };

              scope.prevSlide = function () {
                  scope.currentIndex = (scope.currentIndex < scope.steps.length - 1) ? ++scope.currentIndex : 0;
              };

              scope.nextSlide = function () {
                  scope.currentIndex = (scope.currentIndex > 0) ? --scope.currentIndex : scope.slides.length - 1;
              };
          }
      }
  })
;