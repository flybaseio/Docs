<?php
	$pclass = 'about-page';
	$pageTitle = 'Reading Data | Web Development Guide | Helper Libraries | Developer Docs | ';
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
	<li class="active">Reading Data</li>
</ol>

<div class="text-center well">
	<h3>Reading Data</h3>
	<hr />
</div>

<div class="panel panel-primary">
	<div class="panel-heading" id="section-start">Getting Started</div>
	<div class="panel-body"> 

		<p>We can retrieve data that has been stored in Flybase by attaching an asynchronous listener to a Flybase reference. In this document, we will cover the basics of retrieving data, how Flybase data is ordered, and how to perform queries on Flybase data.</p>

		<p>
			Let's revisit our example from the <a href="/docs/web/guide/saving-data.html">previous article</a> to understand how we read data from Flybase.
		</p>
		<p>
			To simply read our post data, we can do the following:
		</p>
	
		<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

// Attach an asynchronous callback to read the data at our posts reference
ref.on("value", function(snapshot) {
	console.log( snapshot.value() );
});
		</code></pre>
	
		<p>If we run this code, we'll see an object containing all of our posts logged to the console.</p>
		
		<p>The callback function will receive a <code>snapshot</code>, which is a snapshot of the data. A snapshot is a listing of the data in a Flybase app at a single point in time, this could be one document or multiple documents, depending on the query being called, and the number of records that are returned.</p>
		<p>Calling <code>.value()</code> on a snapshot returns the JavaScript object representation of the data. If no data exists at the location, the snapshots value will be <code>null</code>.</p>
		
		<p>You may have noticed that we used the <code>value</code> event type in our example above, which reads the entire contents of a Flybase collection. <code>value</code> is one of the five different <strong>reserved</strong> event types that we can use to read data from Flybase. We'll discuss the other four event types below.</p>
	
		<p>When reading data, we have access to a few methods besides <code>.value()</code>, we can use <code>.count()</code> to get a count of the number of records returned and we can use <code>.forEach()</code> to iterate through each record:</p>
		
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
		
		<p>The <code>.count()</code> method will return <code>null</code> if no documents were found, this can be handy for making sure data actually exists so we don't trigger any errors.</p>
	</div>
</div>
<!-- EVENT TYPES -->
<div class="panel panel-primary">
	<div class="panel-heading" id="section-event-types">Reserved Events</div>
	<div class="panel-body"> 
		<p>Reserved Events are events that are triggered when certain events happen, such as retrieving documents, adding a new document, changing a document, deleting documents or even when a device connects or disconnects.</p>

		<p>These events will always happen, so it's up to you to decide how you want to listen to them and handle them.</p>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading" id="section-event-types">Value</div>
	<div class="panel-body"> 
			<p>
			Whenever you query data, the <code>value</code> event is used to read the contents of a given collection.
			</p>
			<p>
				When the <code>value</code> event is triggered, the event callback is passed a snapshot containing all document data. 
			</p>

		<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

// Attach an asynchronous callback to read the data at our posts reference
ref.on("value", function(snapshot) {
	console.log( "we found " + snapshot.count() + " posts");
	snapshot.forEach( function( post ){
		console.log( post.value() );
	});
});
		</code></pre>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading" id="section-event-types">Document Added</div>
	<div class="panel-body"> 
			<p>
			The <code>added</code> event is typically used when retrieving a list of items in Flybase. Unlike <code>value</code> which returns the entire contents of the location, <code>added</code> is triggered once every time a new document is added to the specified collection. The event callback is passed a snapshot containing the new document's data.
			</p>
			
			<p>If we wanted to retrieve only the data on each new post added to our blogging app, we could use <code>added</code>:</p>
			
			<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

// Retrieve new posts as they are added to Flybase
ref.on("added", function(snapshot) {
	var post = snapshot.value();
	console.log("Author: " + post.author);
	console.log("Title: " + post.title);
});	
			</code></pre>
		
			<p>In this example the snapshot contains an object with an individual blog post. Because we converted our post to an object using <code>.value()</code>, we have access to the post's author and title properties by calling by calling <code>.author</code> and <code>.title</code> respectively.</p>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading" id="section-event-types">Document Updated</div>
	<div class="panel-body"> 
			<p>
			The <code>changed</code> event is triggered any time a document is modified. Normally, it is used along with <code>added</code>
			and <code>removed</code> to respond to changes to a list of items. The snapshot passed to the event callback
			contains the updated data for the document.
			</p>
			
			<p>We can use <code>changed</code> to read updated data on blog posts when they are edited:</p>
			
			<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

// Get the data on a post that has changed
ref.on("changed", function(snapshot) {
	var post = snapshot.value();
	console.log("The updated post title is " + post.title);
});
			</code></pre>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading" id="section-event-types">Document Removed</div>
	<div class="panel-body"> 
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
<div class="panel panel-primary">
	<div class="panel-heading" id="section-event-types">Device Connected / Disconnected</div>
	<div class="panel-body"> 
		<p>
		The <code>online</code> event is triggered whenever another device connects or disconnects from a Flybase app.
		</p>
		
		<p>In our example, we'll use <code>online</code> to log a notification about the number of connected devices to the console:</p>
		
		<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

messagesRef.on('online', function (data) {
	var online = data.value();
	console.log( "There are " + online + " devices connected");
});

		</code></pre>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading" id="section-custom-event-types">Custom Events</div>
	<div class="panel-body"> 
		<p>
		You can also listen for custom events, these are events that don't read or write to your Flybase app, but can be set up to trigger another action.
		</p>
		
		<p>
		For example, you can use this to notify a user of an event:
		</p>
		<pre><code class="language-javascript">
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

ref.on("custom_event", function(message) {
	console.log( message );
});

ref.trigger("custom_event", "Hi")
		</code></pre>
		<p>
			In the above example, we set up a listener for a custom event called <code>custom_event</code> and then triggered it using the <code>.trigger()</code> function, whenever the <code>custom_event</code> event is triggered, we will display the message in the console. This could be used to listen to any type of notification.
		</p>
	</div>  
</div>
	
<div class="panel panel-primary">
	<div class="panel-heading" id="section-queries">Handling How Data Is Returned</div>
	<div class="panel-body"> 
		<p>
		Flybase gives you a query engine that lets you selectively retrieve data based on various factors. 
		</p>
		<p>
		To construct a query in Flybase, you start by specifying how you want your data to be ordered using the <code>orderBy</code> ordering function. You can then combine these with other methods to conduct complex queries: <code>limit()</code>, <code>skip()</code>, and <code>where()</code>.
		</p>
	</div>
</div>	
<div class="panel panel-primary">
	<div class="panel-heading" id="section-event-types">Ordering Data</div>
	<div class="panel-body"> 
		<p>We can order data by a common key by passing that key to <code>orderBy()</code>, followed by <code>1</code> for Ascending or <code>-1</code> for Descending sort order. For example, to sort all posts by author, we can do the following: 
		</p>

		<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

ref.orderBy({"author": 1}).on("value", function(snapshot) {
	console.log( snapshot.value() );
});
		</code></pre>

		<p>You may notice that our <code>orderBy()</code> function takes an object. We've built our query engine heavily based on the MongoDB standard, so you can order by specifying the field, and then <codE>1</code> for Ascending or <code>-1</code> for Descending sort order. You can also add other fields as well:</p>
    
		<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

ref.orderBy({"author": 1,"date": -1}).on("value", function(snapshot) {
	console.log( snapshot.value() );
});
		</code></pre>

		<p>Now that we've specified how your data will be ordered, we can use the <code>limit</code> or <code>skip</code> methods described below to construct more complex queries. On top of that, we can actually perform queries using our query builder.</p>
		</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading" id="section-event-types">Limiting Data</div>
	<div class="panel-body"> 
		<p>
		The <code>limit()</code> function is used to set a maximum number of documents to be synced for a given callback. If we set a limit of 100, we will initially only receive up to 100 documents.
		</p>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading" id="section-event-types">Skipping Data</div>
	<div class="panel-body"> 
		<p>
		Using <code>skip()</code> allows us to choose arbitrary starting and ending points for our queries. This is useful for pagination when combined with <code>limit()</code>.
		</p>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading" id="section-event-types">Querying Data</div>
	<div class="panel-body"> 
			<p>
			The most powerful function you can use for querying data is the <code>where()</code> function, this lets you build queries similar to a database. For example, if we only wanted to return posts that were written by <code>baileys</code>, we can do the following query:
			</p>
			
			<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

ref.where({"author": "baileys"}).on("value", function(snapshot) {
	console.log( snapshot.value() );
});
			</code></pre>
			
			<p>
				This will return all posts that were written by <code>baileys</code>.
			</p>
			
			<p>We can combine all our functions, for example, we can return posts written by <code>baileys</code> and sort by date:</p>
		
			<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

ref.where({"author": "baileys"}).orderBy({"date": 1}).on("value", function(snapshot) {
	console.log( snapshot.value() );
});
			</code></pre>
	
			<p>Just as with the <code>orderBy()</code> functionality, we've built our queries based on MongoDB, so there are a few commands you can use to perform queries, which can help build pretty advanced apps:</p>
	
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Return all documents where </th>
					<th>Query</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						status is "A"
					</td>
					<td>
						{ "status": "A" } or<br />
						{ "status": { "$eq": "A" } }
					</td> 
				</tr>
				<tr>
					<td>
						status is NOT "A"
					</td>
					<td>
						{ "status": { "$not": "A" } }
					</td> 
				</tr>
				<Tr>
					<td>
						age > 25
					</td>
					<td>
						{ "age": { "$gt": 25 } }
					</td>
				</Tr>
				<Tr>
					<td>
						age < 25
					</td>
					<td>
						{ "age": { "$lt": 25 } }
					</td>
				</Tr>
				<Tr>
					<td>
						age > 25 AND   age &lt;= 50
					</td>
					<td>
						 { "age": { "$gt": 25, "$lte": 50 } }
					</td>
				</Tr>
				<tr>
					<td>
						status is "A" AND age > 25
					</td>
					<td>
						{ "$and": [ {"status": "A" }, {"age": { "$gt": 25 } } ] }
					</td>
				</tr>
				<tr>
					<td>
						name contains "<em>bc</em>"
					</td>
					<td>
						{ "name": { "$regex":"bc" } }
					</td>
				</tr>
				<tr>
					<td>
						name is either 'bob' or 'jake'
					</td>
					<td>
						{ "name" { "$in": ["bob", "jake"] } }
					</td>
				</tr>
			</tbody>
		</table>
		<div class="alert alert-info">
			<p>When calling fields, such as <code>name</code> or <code>age</code>, or when calling arguments such as <code>$eq</code>, <code>$not</code>, <code>$gt</code>, <code>$gte</code>, <code>$lt</code>, <code>$lte</code>, <code>$regex</code> or <code>$in</code>, always wrap them in quotes so that you would have <code>"name"</code>, this is proper JSON, and is required for your queries to work. It also makes them easier to read!</p>
		</div>
			
			<p>As you can see, there is a lot you can do with the query system, and this helps greatly extend what you can do with your Flybase app</p>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading" id="section-queries">Getting Data</div>
	<div class="panel-body"> 
		<p>
		You can also use the <code>Get</code> function to retrieve data, data handling is handled the same way as using the <code>value</code> event, but you can include instructions inside the call:
		</p>
		
		<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

ref.get(function(snapshot) {
	console.log( snapshot.value() );
},{l:1});
		</code></pre>
	
		<p>
			This will tell the app to return one record only, you can also include other instructions and queries inside it, we'll cover the queries below. If you leave the options area blank, then you will return all records:
			
		<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

ref.get(function(snapshot) {
	snapshot.forEach( function( post ){
		console.log( post.value() );
	});
});
		</code></pre>
			
		</p>
		<div class="docs-sub-section">
			<div class="page-header">
				<h4>Optional parameters</h4>
			</div>
			
			<ul>
			<li><code>{'q':{query}}</code> - restrict results by the specified JSON query</li>
			
			<li><code>{'c':true}</code> - return the result count for this query</li>
			
			<li><code>{'fo':true}</code> - return a single document from the result set</li>
			
			<li><code>{'s':[sort order]}</code> - specify the order in which to sort each specified field (1- ascending; -1 - descending)</li>
			
			<li><code>{'sk':[num results to skip]}</code> - specify the number of results to skip in the result set; useful for paging</li>
			
			<li><code>{'l':limit}</code> - specify the limit for the number of results (default is 1000)</li>
			</ul>

			<p>Examples using these parameters:</p>
	
			<pre><code class="language-javascript">
// Get a reference to our posts
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");

//	"q" example - return all documents with "active" field of true:
var params = { q: { active: true } };
ref.get(function(snapshot) {
	snapshot.forEach( function( post ){
		console.log( post.value() );
	});
},params);

//	"fo" example - return a single document matching "active" field of true:
var params = { fo: true };
ref.get(function(snapshot) {
	console.log( snapshot.value() );
},params);

//	"s" example - return all documents sorted by "priority" ascending and "difficulty" descending:
var params = { s: {"priority": 1, "difficulty": -1} };
ref.get(function(snapshot) {
	snapshot.forEach( function( post ){
		console.log( post.value() );
	});
},params);

//	"sk" and "l" example - sort by "name" ascending and return 10 documents after skipping 20
var params = { s: {"name": 1},sk: 20,l: 10 };
ref.get(function(snapshot) {
	snapshot.forEach( function( post ){
		console.log( post.value );
	});
},params);
	 		</code></pre>
		</div>
	</div>
</div>
	<p>
	Now that we've covered retrieving data from Flybase, we're ready for the next article on
	<a href="deleting-data.html">deleting data</a> in Flybase.
	</p>
</div>



				</div><!--//about-->
			</div><!--//story-container--> 
		</div><!--//container-->
		<br /><br /><br /><br />
	</section><!--//story-video-->
<?php
	include("../../../includes/footer.php");	
?>