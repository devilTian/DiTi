angular.module('ditiService', []).factory('uiHttp', ['$http', function($http) {
    return function(url, method, data, successFunc, errorFunc) {
        if (!successFunc) {
            successFunc = function() {
            };
        }
        if (!errorFunc) {
            errorFunc = function(ret) {
                alert(ret.data);
            };
        }
        $http({
            method: method ? method : 'POST',
            url: 'index.php/' + url,
            headers: {"content-type": 'application/json'},
            data: data
        }).success(function(ret) {
            ret.status ? successFunc(ret) : errorFunc(ret);
        });
    };
}]);

