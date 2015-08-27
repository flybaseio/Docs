<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Inject the AngularMcFly Services</h3>
	</div>
	<div class="panel-body">	

		<p>Before we can use AngularMcFly with dependency injection, we need to register <code>flybaseResourceHttp</code> as a module in our application.</p>
	
		<pre><code class="language-javascript">
var app = angular.module('testApp', ['ngRoute', 'flybaseResourceHttp']);
app.constant('DATAMCFLY_CONFIG',{API_KEY:'your key goes here', DB_NAME:'angularjs'});
		</code></pre>

		<p>As part of our setup, we've also instructed our app to use our <code>API_KEY</code> and <code>APP_NAME</code>, we don't need to specify collections, as collections will be handled when we create our factory.</p>
		
	</div>
</div>