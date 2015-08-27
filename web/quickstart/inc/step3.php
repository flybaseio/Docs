<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Write to your Flybase App</h3>
	</div>
	<div class="panel-body">	

    <p>
      To write data to your Flybase app, we need to first create a reference to it. We do this by passing our Api Key, app name and a collection to our Flybase constructor:
    </p>

	<pre><code class="language-javascript">
var myDataRef = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "data");
	</code></pre>

	<P>
		A Flybase reference consists of three items:
	</P>
	<ol>
		<li>Your API Key, represented by: <code>74k8064f-cd6f-4c07-8baf-b1d241496eec</code></li>
		<li>The slug of a Flybase app that has been created in your account: <code>web</code></li>
		<li>Finally, the name of a data collection, in this example: <code>data</code></li>
	</ol>
	
	<p>
		Data inside a Flybase app is organized by <strong>collections</strong>, if you are familiar with SQL tables, then this is similar to <strong>tables</strong>.
	</p>
	<p>
		Apps must be created inside your Flybase dashboard, but if you call a collection that does not exist already then it will get created the first time you save data to it.
	</p>

	<p>
		Once we have a reference to your Flybase app, we can write any valid JSON object to it using <code>set()</code>.      
	</p>

	<p><a href="/docs/web/guide/saving-data.html">Our guide on saving data</a> to Flybase explains the different write methods our API offers and how to know when the data has been successfully written to your Flybase app.</p>

	<pre><code class="language-javascript">
myDataRef.set({
	title: "Hello World!",
	author: "Flybase"
});
	</code></pre>

	</div>
</div>