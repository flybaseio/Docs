<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Install Flybase</h3>
	</div>
	<div class="panel-body">

		<p>
		To include the Flybase client library in your website, add a script tag to the <code>&lt;head&gt;</code> section of your HTML file. We recommend including the library directly from our CDN:
		</p>
		
		<pre><code class="language-javascript">
&lt;script src="http://cdn.flybase.io/flybase.js">&lt;/script>
		</code></pre>
		
		<p>You can also install Flybase as a Bower dependency by typing <code>bower install flybase</code>.</p>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Node.js Setup</h3>
	</div>
	<div class="panel-body">
		<p>
		The Flybase JavaScript API and the Flybase Node.js API are exactly the same. Flybase clients run just as easily on your servers as they do on end-user devices. We offer a Node.js module which can be installed via npm from the command line:
		</p>
		
		<pre><code class="language-javascript">
$ npm install flybase --save
		</code></pre>
		
		<p>
		To use the Flybase Node.js module in your application, just <code>require</code> the Flybase client library.
		</p>
		<pre><code class="language-javascript">
var Flybase = require("flybase");
		</code></pre>
	</div>
</div>