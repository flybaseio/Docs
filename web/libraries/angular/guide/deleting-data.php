<?php
	$pclass = 'about-page';
	$pageTitle = 'Deleting Data | Web Development Guide | Helper Libraries | Developer Docs | ';
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
	<li class="active">Deleting Data</li>
</ol>

<div class="text-center well">
	<h3>Deleting Data</h3>
	<hr />
</div>

<div class="panel panel-primary">
	<div class="panel-heading" id="section-start">Getting Started</div>
	<div class="panel-body"> 

		<p>We can delete data that has been stored in Flybase by instructing our Flybase reference to remove a document by using the unique <code>_id</code>.</p>

		<p>
			Let's revisit our example from the <a href="/docs/web/guide/reading-data.html">previous article</a> to understand how we delete data from Flybase.
		</p>
		<p>
			To simply read our post data, we can do the following:
		</p>
			
		<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

// Attach an asynchronous callback to read the data at our posts reference
ref.on("value", function(snapshot) {
	console.log( "we found " + snapshot.count() + " posts");
	if( snapshot.count() ){
		snapshot.forEach( function( post ){
			console.log( post.value() );
		});
	}
});
		</code></pre>
		
		Once you have that data, you can display it, modify it, or delete it. For example, let's say we want to delete a document with the <code>_id</code> of <code>1234567</code>:
		
			
		<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

// Delete the document, and attach an asynchronous callback to read the deleted data
ref.remove("1234567", function(snapshot) {
	console.log('Deleted Document : ', snapshot.value() );
});
		</code></pre>
		
		<div class="alert alert-info">
			<p>You can also use <code>deleteDocument</code> in place of <code>remove()</code>. These methods are aliased to each other and work the same</p>
		</div>

		<p>Deleting data is pretty straight forward, you can also edit or remove documents inside your <strong>Dashboard</strong>.</p>

	</div>
</div>
<!-- EVENT TYPES -->
<div class="panel panel-primary">
	<div class="panel-heading" id="section-event-types">Reserved Events</div>
	<div class="panel-body"> 
		<p>We covered Reserved events in the <a href="/docs/web/guide/reading-data.html">reading data</a> article. Reserved events are events that are triggered when certain events happen, such as retrieving documents, adding a new document, changing a document, deleting documents or even when a device connects or disconnects.</p>

		<p>These events will always happen, so it's up to you to decide how you want to listen to them and handle them.</p>
		
		<p>When you delete a document, the <code>removed</code> event will get triggered, and if we are listening for it, then we can take an action.</p>
		<p>
		The <code>removed</code> event is triggered when a document is removed. Normally, it is used along with <code>added</code> and <code>changed</code>. The snapshot passed to the event callback contains the data for the removed document.
		</p>
		
		<p>In our blog example, we'll use <code>removed</code> to log a notification about the deleted post to the console:</p>
		
		<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

// Get the data on a post that has been removed
ref.on("removed", function(snapshot) {
	var post = snapshot.value();
	console.log("The blog post titled '" + post.title + "' has been deleted");
});
		</code></pre>	    		
    </div>
</div>

</div>



				</div><!--//about-->
			</div><!--//story-container--> 
		</div><!--//container-->
		<br /><br /><br /><br />
	</section><!--//story-video-->
<?php
	include("../../../includes/footer.php");	
?>