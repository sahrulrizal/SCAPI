/**
 * Main AngularJS Web Application
 */
var app = angular.module('scapi', [
  'ngRoute'
]);

/**
 * Configure the Routes
 */
app.config(['$routeProvider', function ($routeProvider) {
  $routeProvider

    .when('/', {
        templateUrl: function () {
            return 'partial/main';
        },controller: "HomeCtrl"
    })
    .when('/page/:n/:g', {
        templateUrl: function () {
            return 'partial/main';
        },controller: "PageCtrl"
    })
    .when('/page/:n', {
        templateUrl: function () {
            return 'partial/main';
        },controller: "PageCtrl"
    })
    .when('/search/:n/:q', {
        templateUrl: function ($routeParams) {
            return 'partial/main'
        },controller: "SearchCtrl"
    })
    .when('/unduh/:id_unduh/:link', {
        templateUrl: function ($routeParams) {
            return 'partials/dwn.php?id=' + $routeParams.id_unduh;
        }
    })
    .when('/404', {
        templateUrl: function () {
            return 'partial/error404';
        }
    })
    .otherwise({
        redirectTo: '/404'
    });
}]);
