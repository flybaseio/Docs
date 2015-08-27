<?php
	$pclass = 'about-page';
	$pageTitle = 'Installation & Setup | Web Development Guide | Helper Libraries | Developer Docs | ';
	include("../../../includes/header.php");	
?>
	<div class="headline-bg about-headline-bg"></div><!--//headline-bg-->         
	<!-- ******Video Section****** --> 
	<section class="story-section section section-on-bg">
		<h2 class="title container text-center">JavaScript Web Guide</h2>
		<div class="story-container container text-center"> 
			<div class="story-container-inner" >
				<div class="about">
<ol class="breadcrumb">
	<li><a href="/docs/">Developer Docs</a></li>
	<li><a href="/docs/web/">Javascript</a></li>
	<li><a href="/docs/web/guide">Web Development Guide</a></li>
	<li class="active">Installation & Setup</li>
</ol>

<div class="text-center well">
	<h3>Installation & Setup</h3>
</div>


        <!-- STEP 1 ########################## -->
<div class="panel panel-primary">
	<div class="panel-heading">Create an account</div>
	<div class="panel-body">
	    <p>
	      Step one, <a href="https://app.flybase.io/signup">sign up for a free account</a>.
	    </p>
	
	    <p>
	      Within the Flybase Dashboard you can create, manage and delete Flybase apps. Clicking on a specific Flybase app lets you view and modify your app's data in realtime. In your app dashboard, you can also set Security, manage your app's authentication, deploys, and view analytics.
	    </p>
	</div>
</div>

<!-- STEP 2 ########################## -->
<div class="panel panel-primary">
	<div class="panel-heading">Install Flybase</div>
	<div class="panel-body">
		  <p>
		      Next, you'll need to include the Flybase JavaScript client library in your website. Simply add a script tag to the
		      <code>&lt;head&gt;</code> section of your HTML file. We recommend including the library directly from our CDN:
		  </p>
			<pre><code class="language-javascript">
&lt;script src="https://cdn.flybase.io/flybase.js">&lt;/script>
			</code></pre>
		  <p></p>
		  <p>
		      If you'd prefer to install Flybase as a local application dependency, then you can also use Bower:
		  </p>
			<pre><code class="language-javascript">
$ bower install flybase
		  </code></pre>
		  <p>
			  This will install a local copy of the Flybase JavaScript client library that you can use in your development.
		  </p>
		  <p></p>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">Node.js Setup</div>
	<div class="panel-body">
		<p>
			Want to know a secret? The Flybase JavaScript API and the Flybase Node.js API are exactly the same. 
		</p>
		<p>
			Flybase clients run just as easily on your servers as they do on end-user devices. We have a Node.js module which can be installed via npm from the command line:
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
		  <p>
		      That's it! Now we're ready to start reading and writing data to Flybase which we'll cover in the <a href="/docs/web/guide/understanding-data.html">next section</a>.
		  </p>


				</div><!--//about-->
			</div><!--//story-container--> 
		</div><!--//container-->
		<br /><br /><br /><br />
	</section><!--//story-video-->
<?php
	include("../../../includes/footer.php");	
?>