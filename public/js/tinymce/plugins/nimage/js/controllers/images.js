/*global define*/
'use strict';

/**
 * The main controller for the app. The controller:
 * - retrieves and persist the model via the todoStorage service
 * - exposes the model to the template and provides event handlers
 */

define(['app', 'services/imageStorage','ng-upload'], function (app) {
	return app.controller('ImageController', ['$scope', 'imageStorage', 'filterFilter',
		function ImageController($scope, imageStorage, filterFilter) {

			imageStorage.get().success(function(data){
				if(data.isSuccess){
					$scope.images = data.data;
					$scope.listempty = data.data.length == 0;
				}

				//$scope
			});

			var selected = [];
			$scope.view = 1;
			$scope.showlist = $scope.view == 1;

			var selectImage = function(url){
				var editor = top.tinymce.activeEditor,
					dom = editor.dom;
				var data = {src:url},
					imgElm;
				data.id = '__mcenew';
				editor.focus();
				editor.selection.setContent(dom.createHTML('img', data));
				imgElm = dom.get('__mcenew');
				dom.setAttrib(imgElm, 'id', null);
				editor.windowManager.close();
			}

			$scope.completed = function(content){
				if(content.isSuccess){
					selectImage(content.data.url);
				}
				
			};

			$scope.selectImg = function(img){
				img.selected = !!!img.selected;
				if(img.selected){
					//selected.push(img);
					selectImage(img.url);
				}
			};

		}
	]);
});
