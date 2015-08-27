<?php
	$pclass = 'about-page';
	$pageTitle = 'Understanding Data | Web Development Guide | Helper Libraries | Developer Docs | ';
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
	<li class="active">Understanding Data</li>
</ol>

<div class="text-center well">
	<h3>Understanding Data</h3>
</div>

<!-- JSON ########################## -->
<div class="panel panel-primary">
	<div class="panel-heading" id="section-its-json">How Data is Handled</div>
	<div class="panel-body">
		<p>
			Inside a Flybase app, we have collections, which contain data.
		</p>
		<p>
			We store all data inside a collection as <strong>JSON objects</strong>. When we add a new record to a collection, it becomes a document in the existing JSON structure. 
		</p>
		<p>
			For example, if we added a column named <code>furbies</code> to the <code>kaitlyn</code> user under the <code>users</code> collection, our data looks as follows:
		</p>
		<pre><code class="language-javascript">
{
	"users": {
		{
			"_id": "uniquedocid-1",
			"username": "kaitlyn",
			"friends": { "jacob": true },
			"name": "Kaitlyn",
			"furbies": { "cocoa": true, "totoa": true }
		},
		{
			"_id": "uniquedocid-2",
			"username": "jacob",
			...
		},
		{
			"_id": "uniquedocid-3",
			"username": "caleb",
			...
		}
	}
}
		</code></pre>
	</div>
</div>
	
<!-- CREATING A REFERENCE ########################## -->
<div class="panel panel-primary">
	<div class="panel-heading" id="section-creating-references" data-nav="Flybase References">
		Creating a Flybase Object Reference
	</div>
	<div class="panel-body">
		<p>
		To read and write Flybase data, we first create a <em>reference</em> to the data store.
		</p>
		
		<pre><code class="language-javascript">
var flybase = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "web", "posts");
		</code></pre>
		
		<P>
		A Flybase object reference consists of three items:
		</P>
		<ol>
		<li>Your API Key, represented by: <code>74k8064f-cd6f-4c07-8baf-b1d241496eec</code></li>
		<li>The slug of a Flybase app that has been created in your account: <code>web</code></li>
		<li>Finally, the name of a data collection, in this example: <code>posts</code></li>
		</ol>
		
		<p>
		Data inside a Flybase app is organized by <strong>collections</strong>, if you are familiar with SQL tables, then this is similar to <strong>tables</strong>.
		</p>
		<p class="well">
		Apps must be created inside your Flybase dashboard, but if you call a collection that does not exist already then it will get created the first time you save data to it.
		</p>
		
		<p>
		Flybase provides a <em>Dashboard</em>, which displays a visual representation of the
		data and provides tools for simple administrative tasks. 
		</p>
		
		<div class="clear"></div>
	</div>
</div>
		  <p>
		      That's it! Now we're ready to start writing data to Flybase which we'll cover in the <a href="/docs/web/guide/saving-data.html">next section</a>.
		  </p>


<?php
/*
  <aside class="well pull-right"  style="width: 30%;margin: 5px;">
    <h5>Data Limits</h5>
    A child node's key cannot be longer than 768 bytes,
    nor deeper than 32 levels. It can include any unicode characters
    except for <code>.</code> <code>$</code> <code>#</code> <code>[</code>
    <code>]</code> <code>/</code> and ASCII control characters 0-31 and 127.
  </aside>
*/
?>
</div>

<?php
/*

<div class="docs-section">
  <h3 id="section-arrays-in-flybase">Arrays in Flybase</h3>
  <p>
    Flybase has no native support for arrays. If we try to store an array, it really gets stored
    as an "object" with integers as the key names.
  </p>

	<pre><code class="language-javascript">
// we send this
['hello', 'world']

// Flybase stores this
{0: 'hello', 1: 'world'}
	</code></pre>
	

  <p>
    However, to help people that are storing arrays in Flybase, when data is read using

    
      <code>.value()</code>
    
    or via the <a href="/docs/api">REST api</a>, if the data looks like
    an array, Flybase will render it as an array. In particular, if all of the keys are integers,
    and more than half of the keys between 0 and the maximum key in the object have non-empty values,
    then Flybase will render it as an array. This latter part is important to keep in mind.
  </p>

	<pre><code class="language-javascript">
// we send this
['a', 'b', 'c', 'd', 'e']

// Flybase stores this
{0: 'a', 1: 'b', 2: 'c', 3: 'd', 4: 'e'}

// since the keys are numeric and sequential,

// if we query the data, we get this
['a', 'b', 'c', 'd', 'e']

// however, if we then delete a, b, and d,
// they are no longer mostly sequential, so
// we do not get back an array
{2: 'c', 4: 'e'}
	</code></pre>

  <p>
    It's not currently possible to change or prevent this behavior. Hopefully understanding it will make it
    easier to see what one can and can't do when storing array-like data.
  </p>

  <p>
    Why not just provide full array support? Since array indices are not permanent or unique, concurrent real-time editing will always be problematic.
  </p>

  <p>
    Consider, for example, if three users simultaneously updated an array on a remote service. If user A
    attempts to change the value at key 2, user B attempts to move it, and user C attempts to change it,
    the results could be disastrous. For example, among many other ways this could fail, here's one:
  </p>

	<pre><code class="language-javascript">
// starting data
['a', 'b', 'c', 'd', 'e']

// record at key 2 moved to position 5 by user A

// record at key 2 is removed by user B

// record at key 2 is updated by user C to foo

// what ideally should have happened
['a', 'b', 'd', 'e']

// what actually happened
['a', 'c', 'foo', 'b']
	</code></pre>
</div>

<div class="docs-section">
  <h3 id="section-limitations">Limitations and Restrictions</h3>

  <p>
    A quick reference to limitations in data storage and read ops.
  </p>

  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Description</th>
      <th>Limit</th>
      <th>Notes</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>Depth of child nodes</td>
      <td>32</td>
      <td></td>
    </tr>
    <tr>
      <td>Length of a key</td>
      <td>768 bytes</td>
      <td>UTF-8 encoded, cannot contain <code>.</code> <code>$</code>
          <code>#</code> <code>[</code> <code>]</code> <code>/</code>
          or ASCII control characters 0-31 or 127</td>
    </tr>
    <tr>
      <td>Size of one child value</td>
      <td>10mb</td>
      <td>UTF-8 encoded</td>
    </tr>
    <tr>
      <td>Write from SDK</td>
      <td>16mb</td>
      <td>UTF-8 encoded</td>
    </tr>
    <tr>
      <td>Write from REST</td>
      <td>256mb</td>
      <td></td>
    </tr>
    <tr>
      <td>Nodes in a read operation</td>
      <td>100 million</td>
      <td></td>
    </tr>
    </tbody>
  </table>
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