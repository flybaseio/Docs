<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Create Our Factory</h3>
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