<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Build Our Controllers and Views</h3>
	</div>
	<div class="panel-body">

		<p>As soon as you've created your factory, you are ready to inject and use a freshly created resource in your services and controllers:</p>

		<div role="tabpanel">
			<ul class="nav nav-tabs" role="tablist" id="myTab">
				<li role="presentation" class="active"><a href="#javavscript" aria-controls="javavscript" role="tab" data-toggle="tab">JavaScript</a></li>
				<li role="presentation"><a href="#html1" aria-controls="html1" role="tab" data-toggle="tab">index.html</a></li>
				<li role="presentation"><a href="#html2" aria-controls="html2" role="tab" data-toggle="tab">list.html</a></li>
				<li role="presentation"><a href="#html3" aria-controls="html3" role="tab" data-toggle="tab">form.html</a></li>				
			</ul>
			<div class="tab-content well">
				<div role="tabpanel" class="tab-pane fade in active" id="javavscript">
					<pre><code class="language-javascript">
app.controller('AppController', function ($scope, $timeout, Message) {
    Message.all().then(function(messages){
        $scope.messages = messages;
    });

	//	grab the Flybase object...
	var Ref = Message.flybase();
	
	//	set up events to listen for changes...
	Ref.on('added', function( data ){
		$timeout(function() {
			$scope.messages.push( data.value() );
		});
	});

	Ref.on('changed', function( data ){
		$timeout(function() {
			var snapshot = data.value();
			for( i in $scope.messages ){
				var project = $scope.messages[ i ];
				if( project._id == snapshot._id ){
					$scope.messages[ i ] = snapshot;
				}
			}
		});
	});

	Ref.on('removed', function( data ){
		$timeout(function() {
			var snapshot = data.value();
			for( i in $scope.messages ){
				var project = $scope.messages[ i ];
				if( project._id == snapshot._id ){
					$scope.messages.splice(i, 1);
				}
			}
		});
	});

});
app.controller('MessageController', function ($scope, $route, $window, message) {
	var messageCopy = angular.copy( message );
	$scope.message = message;

	$scope.save = function(){
		$scope.message.$saveOrUpdate().then( function(returnData){
			console.log( returnData );
			$window.location.assign('/');
		}, function(error) {
			throw new Error('Sth went wrong...');
		});
	};
	
	$scope.remove = function() {
		$scope.message.$remove(function() {
			$window.location.assign('/');
		}, function() {
			throw new Error('Sth went wrong...');
		});
	};

	$scope.hasChanges = function(){
		return !angular.equals($scope.message, messageCopy);
	};
});

app.config(function ($routeProvider) {
	$routeProvider.when('/list', {templateUrl:'list.html', controller:'AppController', resolve:{
		messages:function(Message){
			return Message.all();
		}
	}}).when('/edit/:id', {templateUrl:'form.html', controller:'MessageController', resolve:{
		message:function(Message, $route){
			return Message.getById($route.current.params.id);
		} 
	}})
	.when('/new', {templateUrl:'form.html', controller:'MessageController', resolve:{
		message:function(Message){
			return new Message();
		}
	}})
	.otherwise({redirectTo:'/list'});
});

					</code></pre>
				</div>
				<div role="tabpanel" class="tab-pane fade in" id="html1">
					<pre><code class="language-javascript">
&lt;!doctype html>
&lt;html ng-app="testApp" >
&lt;head>
	&lt;meta charset="utf-8">
	&lt;title>Flybase resource with promises support&lt;/title>
	&lt;link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

	&lt;!-- AngularJS -->
	&lt;script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular.js">&lt;/script>
	&lt;script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.22/angular-route.js">&lt;/script>

	&lt;!-- Flybase -->
	&lt;script src="https://cdn.flybase.io/flybase.js">&lt;/script>

	&lt;!-- AngularMcFly -->
	&lt;script src="https://cdn.flybase.io/angularmcfly.js">&lt;/script>
&lt;/head>   
&lt;body>
	&lt;header>
		&lt;h1>Flybase Angular&lt;/h1>
	&lt;/header>
	&lt;div ng-view>&lt;/div>
&lt;/body>
&lt;/html>
					</code></pre>
				</div>
				<div role="tabpanel" class="tab-pane fade in" id="html2">
					<pre><code class="language-javascript">
&lt;h3>Messages&lt;/h3>
&lt;ul>
	&lt;li ng-repeat="message in messages">
		{{message.text}}
		&lt;a ng-href="#/edit/{{message.$id()}}">edit&lt;/a>
	&lt;/li>
&lt;/ul>
&lt;div class="well">
	&lt;a class="btn btn-default" ng-href="#/new">New Message&lt;/a>
&lt;/div>
					</code></pre>
				</div>
				<div role="tabpanel" class="tab-pane fade in" id="html3">
					<pre><code class="language-javascript">
&lt;form name="form">
	&lt;div class="form-group">
		&lt;label>Message&lt;/label>
		&lt;input type="text" ng-model="message.text" class="form-control">
	&lt;/div>
	&lt;div class="well">
		&lt;a class="btn btn-primary" ng-click="save()" ng-disabled="!hasChanges()||form.$invalid">Save&lt;/a>
		&lt;a class="btn btn-warning" ng-href="#/">Go Back&lt;/a>
		&lt;a class="btn btn-danger" ng-click="remove()" ng-disabled="!message.$id()">Remove&lt;/a>
	&lt;/div>
&lt;/form>
					</code></pre>
				</div>
			</div>
		</div>		
	</div>
</div>

<?php
/*

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Listen for events</h3>
	</div>
	<div class="panel-body">	

		<p>Then, creating new resources is very, very easy and boils down to calling <code>$flybaseResource</code> with a Flybase collection name:</p>

		<pre><code class="language-javascript">
app.factory('Message', function ($flybaseResourceHttp) {
	return $flybaseResourceHttp('messages');
});
		</code></pre>
	</div>
</div>


var Ref = Project.flybase();

	Ref.on('added', function( data ){
		$timeout(function() {
			$scope.projects.push( data.value() );
		});
	});
	Ref.on('changed', function( data ){
		$timeout(function() {
			var snapshot = data.value();
			for( i in $scope.projects ){
				var project = $scope.projects[ i ];
				if( project._id == snapshot._id ){
					$scope.projects[ i ] = snapshot;
				}
			}
		});
	});
	Ref.on('removed', function( data ){
		$timeout(function() {
			var snapshot = data.value();
			for( i in $scope.projects ){
				var project = $scope.projects[ i ];
				if( project._id == snapshot._id ){
					$scope.projects.splice(i, 1);
				}
			}
		});
	});
})

*/
?>