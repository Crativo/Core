<form ng-controller="PhpCtrl" name="f1">
<input type="text" name="name">
<input type="text" name="password">
<pre ng-model="codeStatus">{{codeStatus}}</pre>
<input type="submit" ng-click="add()" value="Submit">
</form>

<script type="text/javascript">
var CORE = angular.module('CORE', []);
function PhpCtrl($scope, $http, $templateCache) {
  var method = 'POST';
  var url = 'process.php';
  $scope.codeStatus = "";

  $scope.add = function() {
    var FormData = {
      'name' : document.f1.name.value,
      'password' : document.f1.password.value
    };
    $http({
      method: method,
      url: url,
      data: FormData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      cache: $templateCache
    }).
    success(function(response) {
        $scope.codeStatus = response.data;
    }).
    error(function(response) {
        $scope.codeStatus = response || "Request failed";
    });
    return false;
  };
  
}
</script>