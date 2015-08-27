<?php
	$pclass = 'about-page';
	$pageTitle = 'Saving Data | Web Development Guide | Helper Libraries | Developer Docs | ';
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
	<li class="active">Saving Data</li>
</ol>

<div class="text-center well">
	<h3>Saving Data</h3>
</div>

<!--
	<pre><code class="language-javascript">
&lt;script src="http://cdn.flybase.io/flybase.js">&lt;/script>
	</code></pre>
-->

	<!-- WRITING DATA SET() -->
<div class="panel panel-primary">
	<div class="panel-heading" id="section-set" data-nav="Writing Data">Saving Data</div>
	<div class="panel-body">
	    <p>
	The basic Flybase write operation is <code>set()</code> which saves new data to the specified Flybase collection. To understand <code>set()</code>, we'll build a simple blogging app. The data for our app will be stored at this Flybase reference:
	    </p>
	
		<pre><code class="language-javascript">
var ref = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "blog");
		</code></pre>
	
	    <p>
	Let's start by saving some user data to our Flybase app. We'll store each user in Flybase with a unique username, and
	we'll also store their full name and date of birth in Flybase. 
	    </p>
	
	    <p>First, we'll create a reference object to our user data. Then we'll use <code>set()</code> to save a user object to Flybase with the user's username, full name, and birthday. We can pass <code>set()</code> a string, number, boolean, array or any JSON object. In this case we'll pass it an object:</p>
	
		<pre><code class="language-javascript">
var usersRef = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "users");
usersRef.set({
	username: "baileys",
	date_of_birth: "June 9, 1978",
	full_name: "Bailey Stringer"
});
		</code></pre>
	
		<div class="alert alert-info">
			<p>You can also use <code>insertDocument</code> or <code>push()</code> in place of <code>set()</code>. These methods are aliased to each other and work the same</p>
		</div>
	
	    <p>
	        When a JSON object is saved to Flybase, the object properties are automatically added to the collection you specified, in this case <code>users</code>. Now if we navigate to our <code>web</code> app in our dashboard,
	        we'll see the value "Bailey Stringer" in the <code>users</code> collection.
	    </p>
	
	    <p>
	        The above example will result in the same data being saved to your Flybase app:
	    </p>
	
		<pre><code class="language-javascript">
{
	"users": {
		"_id": "uniquedocumentid",
		"username": "baileys",
		"date_of_birth": "July 4, 2004",
		"full_name": "Bailey Stringer"
	}
}
		</code></pre>
	
		<p>
			Every record will have a unique <code>_id</code> field, which we use later when we push updates.
		</p>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading" id="section-update">Optional callback</div>
	<div class="panel-body">
			<p>You can also attach callbacks to your insert or update, this will show you the status.</p>

			<pre><code class="language-javascript">
var usersRef = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "users");
usersRef.set({
	username: "baileys",
	date_of_birth: "June 9, 1978",
	full_name: "Bailey Stringer"
}, function(data){
	var user = data.value();
	console.log( "New user was saved as " + user._id );
});
			</code></pre>

			<p>New records will return a <code>_id</code> variable inside the <code>.value()</code> method. Updates will return the updated document.</p>
	</div>
</div>

<!-- UPDATING DATA -->
<div class="panel panel-primary">
	<div class="panel-heading" id="section-update">Updating Existing Data</div>
	<div class="panel-body">
		<p>
			If you want to update documents inside a Flybase collection, then you can use the <code>update()</code> method as shown below:
		</p>

		<pre><code class="language-javascript">
var usersRef = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "users");
usersRef.where( {username: "baileys"} ).on('value', function (response) {
	response.forEach( function( data ){
		var user = data.value();

		user.nickname = "Dog";

		//	update the user record...
		usersRef.update(user._id,user, function(resp) {
			console.log( "User updated" );
		});
	});
});
		</code></pre>
	
		<p>
			In this example, we performed a <code>query</code> to return Bailey's user record, then we updated his data to include his nickname.
	    </p>
		<div class="alert alert-info">
			<p>If you use <code>set()</code> or <code>push()</code> to save data and the object you are saving contains an <code>_id</code> record, then it will automatically <code>update</code> the document in question rather than saving a new record.</p>
		</div>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading" id="section-servervalues">Server Values</div>
	<div class="panel-body">    
	    <p>
		    Flybase lets you specify variables that are set on the server end. This is handy for dealing with cases such as users in multiple timezones and you want to store a timestamp locally to the Flybase servers.
	    </p>
	    
	    <table class="table table-bordered">
	    <thead>
		    <tr>
			    <th>Server Value</th>
			    <th>Definition</th>
	    </thead>
	    <tbody>
		    <tr>
			    <td>Flybase.ServerValue.TIMESTAMP</td>
			    <td>A placeholder value for auto-populating the current timestamp (time since the Unix epoch, in milliseconds) by the Flybase servers.</td>
		    </tr>
		    <tr>
			    <td>Flybase.ServerValue.UTC</td>
			    <td>A placeholder value for auto-populating the current UTC date (<?= date('Y-m-d H:i:s') ?>) by the Flybase servers.</td>
		    </tr>
		    <tr>
			    <td>Flybase.ServerValue.UNIQUE</td>
			    <td>A placeholder value for auto-populating the field with a unique id.</td>
		    </tr>
		    <tr>
			    <td>Flybase.ServerValue.UUID</td>
			    <td>A placeholder value for auto-populating the field with a unique UUID field.</td>
		    </tr>
	    </tbody>
	    </table>
	
		<pre><code class="language-javascript">
var usersRef = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "users");
usersRef.push({
	username: "baileys",
	date_of_birth: "July 4, 2004",
	full_name: "Bailey Stringer"
	registered_date: "Flybase.ServerValue.TIMESTAMP"
});
		</code></pre>
</div>	

</div>


<?php
/*
<!-- SAVING LISTS OF DATA -->
<div class="panel panel-primary">
	<div class="panel-heading" id="section-push">Saving Lists of Data</div>
	<div class="panel-body"> 
	    <p>
	        When creating lists of data, it is important to keep in mind the multi-user nature of most applications and
	        adjust your list structure accordingly. Expanding on our example above, let's add blog posts to our app. When you use <code>push()</code> to add new data, it will return a unique <code>_id</code> in the update data.
	    </p>
	
		<pre><code class="language-javascript">
var postsRef = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");
postsRef.push({
	author: "gracehop",
	title: "Announcing COBOL, a New Programming Language",
	date: "Flybase.ServerValue.TIMESTAMP"
});
postsRef.push({
	author: "baileys",
	title: "The Stringer Machine",
	date: "Flybase.ServerValue.TIMESTAMP"
});
		</code></pre>
	
		Because we used <code>push()</code>, Flybase generated a timestamp-based, unique ID for each blog post, and no write conflicts will occur if multiple users create a blog post at the same time. Our data in Flybase now looks like this:
	
		<pre><code class="language-javascript">
{
	"posts": {
		"_id" : "uniquedocid-1",
		"author": "gracehop",
		"title": "Announcing COBOL, a New Programming Language",
		"date": "1419356786"
	},
	{
		"_id": "uniquedocid-2",
		"author": "alanT",
		"title": "The Stringer Machine",
		"date": "1419356786"
	}
}
		</code></pre>
	</div>
</div>	
*/?>
    <p>In the next section on <a href="reading-data.html">Reading Data</a>, we'll learn how to read this data from Flybase.</p>
</div>
<?php
/*
<!-- SECURING  DATA -->
<div class="panel panel-primary">
	<div class="panel-heading" id="section-securing-data">Securing Your Data</div>
	<div class="panel-body"> 
		<p>
			Flybase has a security language that lets you define which users have read and write access to different nodes of your data. You can read more about it in <a href="security.html">Securing Your App</a>.
		</p>
	</div>
</div>
*/
?>

				</div><!--//about-->
			</div><!--//story-container--> 
		</div><!--//container-->
		<br /><br /><br /><br />
	</section><!--//story-video-->
<?php
	include("../../../includes/footer.php");	
?>