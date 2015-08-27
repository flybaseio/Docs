<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Read from your Flybase App</h3>
	</div>
	<div class="panel-body">	

		<p>
		Data is read from your Flybase app by attaching listeners and handling the resulting events. Assuming we already wrote to <code>myDataRef</code> above, we can retrieve the value by using the <code>on()</code> method:
		</p>
		
		<pre><code class="language-javascript">
myDataRef.on("value", function(data) {
	data.forEach( function(snapshot){
		console.log( snapshot.value() );
	});
});
		</code></pre>
		
		<p>Data return from a <code>value</code> event can be accessed by calling a <code>.forEach()</code> method and a <code>.value()</code> method to access the document data returned from the callback to access a JSON object.</p>
		
		<p>
		In the example above, the <code>value</code> event will return the document data. You can learn more about the various event types and how to handle event data in our <a href="/docs/web/guide/reading-data.html">documentation on reading data</a>.
		</p>

	</div>
</div>