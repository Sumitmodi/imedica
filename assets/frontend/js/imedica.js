'use strict';
var app = angular.module('imedica', []);

app.controller('KnowledgeBase', function ($scope, $http) {
    $scope.page = 'Knowledgebase';
    $scope.pageTemplate = 'knowledgebase.html';

    $scope.load = function (type) {
        $scope.page = type;
        if($scope.page == 'cims') {
            $scope.pageTemplate = 'assets/frontend/templates/cims.html';
            $http.get('imedica/categories').then(function (res) {
                $scope.categories = res.data;
            });
            $http.get('imedica/cims').then(function (res) {
                $scope.cims = res.data;
            });
        }
        return false;
    };
});
