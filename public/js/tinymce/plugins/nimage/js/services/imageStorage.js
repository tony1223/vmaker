/*global define*/
'use strict';

/**
 * Services that persists and retrieves TODOs from localStorage.
 */
define(['app'], function (app) {
	app.factory('imageStorage',["$http", function ($http) {
		//var STORAGE_ID = 'todos-angularjs-requirejs';
		return {
			get: function () {
				return $http.post('/image/recent');
			},
			put: function (todos) {
				//localStorage.setItem(STORAGE_ID, JSON.stringify(todos));
			}
		};
	}]);
});
