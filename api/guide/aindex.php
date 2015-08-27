<?php
	$pclass = 'about-page';
	$pageTitle = 'Development Guide | REST API | Helper Libraries | Developer Docs | ';
	include("../../../includes/header.php");	
?>
	<div class="headline-bg about-headline-bg"></div><!--//headline-bg-->         
	<!-- ******Video Section****** --> 
	<section class="story-section section section-on-bg">
		<h2 class="title container text-center">Flybase REST API Development Guide</h2>
		<div class="story-container container text-center"> 
			<div class="story-container-inner" >
				<div class="about">
<ol class="breadcrumb">
	<li><a href="/docs/">Developer Docs</a></li>
	<li><a href="/docs/api/">REST API</a></li>
	<li class="active">REST API Development Guide</li>
</ol>

<div class="well">
	<p>Build mobile and web apps in minutes using the Flybase REST API.</p>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">Overview</div>
	<div class="panel-body">

		<p>The Flybase REST API allows you to query data in your apps, write data, update data and even delete data.</p>

		<p>Since the API is based on REST principles, it's very easy to write and test applications. You can use your browser to access URLs, and you can use pretty much any HTTP client in any programming language to interact with the API.</p>
	</div>
</div>

<div class="alert alert-info">
	<p>HTTPS is required. Flybase only responds to encrypted traffic so that your data remains safe.</p>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">Base URL and headers</div>
	<div class="panel-body">
		<p>All URLs referenced in the documentation have the following base:</p>
		
		<pre><code class="language-javascript">
https://api.flybase.io/
		</code></pre>
					
		<p>The Flybase REST API is served over HTTPS. To ensure data privacy, unencrypted HTTP is not supported.</p>

		<p>In order to access any data from the REST API, you must pass a header called <code>X-Flybase-API-KEY</code>

		<pre><code class="language-javascript">
curl -H "X-Flybase-API-Key: 74c8062f-cd6f-4c07-8baf-b1h241496dec"  https://api.flybase.io/
		</code></pre>
		
		Calling the REST API without any actions in the URL will result in validating the API Key. You can also call the REST API with the following end point to validate the API key:
		
		<pre><code class="language-javascript">
curl -H "X-Flybase-API-Key: 74c8062f-cd6f-4c07-8baf-b1h241496dec"  https://api.flybase.io/validate_key
		</code></pre>
		
		<p>An invalid API Key will result in not being able to do any other actions with the REST API. You can create new API Keys and add rules such as limiting access to apps or whitelisting access only to specified IP addresses or websites from your account.</p>
	</div>
</div>
<div class="page-header">
	<h2>API Reference</h2>
</div>
<?php
/*
<div class="panel panel-primary">
	<div class="panel-heading">List Apps</div>
	<div class="panel-body">
		<p>To get a list of apps linked to an authenticated account:</p>

		<pre><code class="language-javascript">
GET /apps
		</code></pre>

		<pre><code class="language-javascript">
curl -H "X-Flybase-API-Key: 74c8062f-cd6f-4c07-8baf-b1h241496dec"  https://api.flybase.io/apps
		</code></pre>

		<p>
	</div>
</div>
*/
?>
<div class="panel panel-primary">
	<div class="panel-heading">List your Collections</div>
	<div class="panel-body">
		<p>To get a list of collections in the specified app:</p>

		<pre><code class="language-javascript">
GET /apps/{app}/collections
		</code></pre>

		<pre><code class="language-javascript">
curl -H "X-Flybase-API-Key: 74c8062f-cd6f-4c07-8baf-b1h241496dec"  https://api.flybase.io/apps/MY-APP/collections
		</code></pre>

		<p>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">Create a new collection</div>
	<div class="panel-body">
		<p>To create a new collection, just start using it! Collections are created implicitly just by using them. As soon as you POST your first document you should see the collection appear.</p>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">List Documents</div>
	<div class="panel-body">
		<p>To get the documents in the specified collection. If no parameters are passed, it lists all of them. Otherwise, it lists the documents in the collection matching the specified parameters:
:</p>

		<pre><code class="language-javascript">
GET /apps/{app}/collections/{collection}
		</code></pre>

		<pre><code class="language-javascript">
curl -H "X-Flybase-API-Key: 74c8062f-cd6f-4c07-8baf-b1h241496dec"  https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION
		</code></pre>

		<p>A successful request will be indicated by a 200 OK HTTP status code. The response will contain the data being retrieved:</p>

		<pre><code class="language-javascript">
{ "_id": "uniquedocid-1", "first": "Jack", "last": "Sparrow", "active": 1}
		</code></pre>
		
		<div class="alert alert-info">
			<p>All documents contain a <code>_id</code> field, you can use this for updating or deleting the document later. Any other fields depend on your structure</p>
		</div>
			
		<div class="docs-sub-section">
			<div class="page-header">
				<h4>Optional parameters</h4>
			</div>
			
			<p>Our optional parameters are based on <a href="http://docs.mongodb.org/manual/reference/operator/">MongoDB references</a>, so you can build a query similar to how you would with MongoDB. This helps give you a lot of power and flexibility.</p>
			
			<ul>
			<li><code>q=&lt;query&gt;</code> - restrict results by the specified JSON query</li>
			
			<li><code>c=true</code> - return the result count for this query</li>
			
			<li><code>f=&lt;set of fields&gt;</code> - specify the set of fields to include or exclude in each document (1 - include; 0 - exclude)</li>
			
			<li><code>fo=true</code> - return a single document from the result set</li>
			
			<li><code>s=&lt;sort order&gt;</code> - specify the order in which to sort each specified field (1- ascending; -1 - descending)</li>
			
			<li><code>sk=&lt;num results to skip&gt;</code> - specify the number of results to skip in the result set; useful for paging</li>
			
			<li><code>l=&lt;limit&gt;</code> - specify the limit for the number of results (default is 1000)</li>
			</ul>

			<p>Examples using these parameters:</p>
	
			<pre><code class="language-javascript">
"q" example - return all documents with "active" field of true:
https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION?q={"active": true}

"c" example - return the count of documents with "active" of true:
https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION?q={"active": true}&amp;c=true

"f" example (include) - return all documents but include only the "firstName" and "lastName" fields:
https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION?f={"firstName": 1, "lastName": 1}

"f" example (exclude) - return all documents but exclude the "notes" field:
https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION?f={"notes": 0}

"fo" example - return a single document matching "active" field of true:
https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION?q={"active": true}&amp;fo=true

"s" example - return all documents sorted by "priority" ascending and "difficulty" descending:
 https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION?s={"priority": 1, "difficulty": -1}

"sk" and "l" example - sort by "name" ascending and return 10 documents after skipping 20
 https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION?s={"name":1}&amp;sk=20&amp;l=10
	 		</code></pre>
		</div>
	</div>
</div>

<?php
/*
<div class="panel panel-primary">
	<div class="panel-heading">Download</div>
	<div class="panel-body">

		<p>Supported by GET. If you would like to trigger a file download of your data from a web browser, add "download=". This will cause our REST service to add the appropriate headers so that browsers know to save the data to a file.</p>

		<pre><code class="language-javascript">
curl -H "X-Flybase-API-Key: 74c8062f-cd6f-4c07-8baf-b1h241496dec"  https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION?download=myfilename.txt
		</code></pre>
	</div>
</div>
*/
?>

<div class="panel panel-primary">
	<div class="panel-heading">Insert a new Document</div>
	<div class="panel-body">
		<p>To create a new document in the specified collection:</p>

		<pre><code class="language-javascript">
POST /apps/{app}/collections/{collection}
Content-Type: application/json
Body: &lt;JSON data>
		</code></pre>

		<pre><code class="language-javascript">
curl -X POST -d '{ "first": "Jack", "last": "Sparrow" }' \
  -H "X-Flybase-API-Key: 74c8062f-cd6f-4c07-8baf-b1h241496dec" \
  https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION
		</code></pre>

		<p>If you POST a document that contains an <code>_id</code> field, the effect will be to overwrite any existing document with that <code>_id</code>. When your document already includes an <code>_id</code> value, think of POST like “save” or “upsert” (discussed below) rather than “create” or “insert”.</p>
		
		<p class="well">One consequence of this behavior: for a document with an <code>_id</code> specified, there is no straightforward way in the API to realize a pure “insert” — that is, an operation that refuses to modify a pre-existing document with that <code>_id</code>. POST will save over the old document; PUT will modify it. If this property is problematic for your application, consider using a field other than <code>_id</code>, with its own index to enforce uniqueness.</p>
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
curl -X POST -d '{ "first": "Jack", "last": "Sparrow","registered_date": Flybase.ServerValue.TIMESTAMP }' \
  -H "X-Flybase-API-Key: 74c8062f-cd6f-4c07-8baf-b1h241496dec" \
  https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION
		</code></pre>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">View, update or delete a single document</div>
	<div class="panel-body">

		<div class="docs-sub-section">
			<div class="page-header">
				<h4>Returns the document with the specified <code>_id</code>:</h4>
			</div>

			<pre><code class="language-javascript">
GET /apps/{app}/collections/{collection}/{_id}
			</code></pre>

			<pre><code class="language-javascript">
https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION/4e7315a65e4ce91f885b7dde 
			</code></pre>

		</div>

		<div class="docs-sub-section">
			<div class="page-header">
				<h4>Modify the document with the specified <code>_id</code>:</h4>
			</div>

			<p>Modifies the document matching the specified <code>_id</code>. If no document matching the specified <code>_id</code> already exists, it creates a new document. The data payload should contain a replacement document or update modifiers:</p>

			<pre><code class="language-javascript">
PUT /apps/{app}/collections/{collection}/{_id}
Content-Type: application/json 
Body: &lt;JSON data>
			</code></pre>
		</div>
		<div class="docs-sub-section">
			<div class="page-header">
				<h4>Delete the document with the specified <code>_id</code>:</h4>
			</div>
			<pre><code class="language-javascript">
DELETE /apps/{app}/collections/{collection}/{_id}
			</code></pre>
	
			<pre><code class="language-javascript">
curl -X DELETE 'https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION/4e7315a65e4ce91f885b7dde
			</code></pre>
		</div>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">Update multiple documents</div>
	<div class="panel-body">
	
To update one or more documents in the specified collection, use a <code>PUT</code> request with a replacement document or update modifiers in the body:

			<pre><code class="language-javascript">
PUT /apps/{app}/collections/{collection}
Content-Type: application/json
Body: &lt;JSON data>
			</code></pre>
			
<p>Example setting "x" to 3 in the document with "_id" = 1234</p>

		<pre><code class="language-javascript">
curl -X PUT -d '{ "x": "3" }' \
  -H "X-Flybase-API-Key: 74c8062f-cd6f-4c07-8baf-b1h241496dec" \
  https://api.flybase.io/apps/MY-APP/collections/MY-COLLECTION?q={"_id":1234}
		</code></pre>
	</div>
</div>

<div class="panel panel-primary">
	<div class="panel-heading">HTML Status Codes</div>
	<div class="panel-body">
		<p>The API commonly returns the following codes. For further reference, see <a href="http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html" target="_blank">W3C’s documentation</a>.</p>

	    <table class="table table-bordered">
		<thead>
			<tr>
				<th width=30%>HTTP Status Code</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>200 - OK</th>
				<td>Returned whenever a resource is listed, viewed, updated or deleted</td>
			</tr>
			<tr>
				<th>201 - Created</th>
				<td>Returned whenever a resource is created (instead of code 200)</td>
			</tr>
			<tr>
				<th>400 - Bad Request</th>
				<td>Returned whenever a request cannot be fulfilled because of an error with the input</td>
			</tr>
			<tr>
				<th>401 - Unauthorized</th>
				<td>Returned either when no user credentials could be found or the credentials found are not authorized to perform the requested action</td>
			</tr>
			<tr>
				<th>403 - Forbidden</th>
				<td>Returned whenever the server is refusing access to a resource, usually because the user does not have permissions to it</td>
			</tr>
			<tr>
				<th>404 - Not Found</th>
				<td>Returned whenever the resource being requested does not exist</td>
			</tr>
			<tr>
				<th>405 - Method Not Allowed</th>
				<td>Returned whenever the HTTP method (e.g. GET or POST) is not supported for the resource being requested</td>
			</tr>
		</tbody>
	    </table>
	</div>
</div>

<?php
/*
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-12">
<a href="/docs/api/quickstart/">
		<div class="panel panel-primary">
			<div class="panel-heading">Quickstart</div>
			<div class="panel-body">
				<p>5 minute introduction</p>
			</div>
		</div>
</a>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-12">
<a href="/docs/api/guide">
		<div class="panel panel-primary">
			<div class="panel-heading">Guide</div>
			<div class="panel-body">
				<p>Step by Step Guide</p>
			</div>
		</div>
</a>
	</div>
*/
?>
<?php
/*
	<div class="col-md-4 col-sm-6 col-xs-12">
<a href="/docs/web/api">
		<div class="panel panel-primary">
			<div class="panel-heading">API</div>
			<div class="panel-body">
				<p>Full List of API Methods</p>
			</div>
		</div>
</a>
	</div>
</div>
*/
?>
<?php
/*
<div class="panel panel-primary">
	<div class="panel-heading">Libraries</div>
	<div class="panel-body">
		<p>Officially supported libraries created and maintained by Flybase.</p>
		<ul>
			<li>
				<a href="https://github.com/flybaseio/flybase-js"> JavaScript Helper Library</a>
			</li>
			<li>
				<a href="https://github.com/flybaseio/flybase-node">Node (Node.JS Module)</a>
			</li>
			<li>
				<a href="https://github.com/flybaseio/flybase-angularjs">
					Angular (AngularJS Helper Library)</a>
			</li>
		</ul>
	</div>
</div>

<p>Don't see your language? We are always looking to expand our API libraries. If you have a library, get in touch with our <a href="/contact">support team</a>.</p>
*/
?>

<!--
<h3>Reference</h3>
<div class="row">
	<div class="col-md-5 well">
		<h3>Helper Libraries</h3>
		<p>Libraries to help you interact with the Flybase REST API. Available in PHP, JavaScript, AngularJS, NodeJS and more.</p>
		<p><a class="btn btn-primary" href="/docs/helper-libraries">Download & Install »</a></p>
	</div>
	<div class="col-md-5 col-md-offset-2 well">
		<h3>API docs</h3>
		<p>HTTP-level request & response documentation for all functionality in the <strong>Flybase REST API</strong>.</p>
		<p><a class="btn btn-primary" href="#">Learn More »</a></p>
	</div>
</div>
<h3>Getting Started</h3>
<div class="row">
	<div class="col-md-5 well">
		<h3>Quick starts</h3>
		<p>A set of simple tutorials with code snippets on how to use Flybase to store and retreive data.
		</p>
		<p><a class="btn btn-primary" href="#">Start Coding Now »</a></p>
	</div>
	<div class="col-md-5 col-md-offset-2 well">
		<h3>How-Tos</h3>
		<p>Sample applications that cover common use cases in a variety of languages. Download, test drive, and tweak them yourself.</p>
		<p><a class="btn btn-primary" href="#">View Sample Apps »</a></p>
	</div>
</div>
-->
<?php
/*
<div class="row">
	<div class="col-md-5 well">
		<h3>Security</h3>
		<p>Details about the security & reliability measures you can leverage in interacting with the Flybase API.</p>
		<p><a class="btn btn-primary" href="#">Learn More »</a></p>
	</div>
</div>
*/
?>
<!--
					<ul class="fa-ul">
						<li><i class="fa-li fa fa-check-square"></i>
							<a href="/docs/web/">Web <small>(Javascript)</small></a>
						</li>
						<li><i class="fa-li fa fa-check-square"></i>
							<a href="/docs/php/">PHP</a>
						</li>
						<li><i class="fa-li fa fa-check-square"></i>
							<a href="/docs/rest/">REST API <small>(Server side platforms)</small></a>
						</li>
						<li><i class="fa-li fa fa-check-square"></i>
							<a href="/docs/help/">Support</a>
						</li>
					</ul>
-->
				</div><!--//about-->
			</div><!--//story-container--> 
		</div><!--//container-->
		<br /><br /><br /><br />
	</section><!--//story-video-->
<?php
	include("../../../includes/footer.php");	
?>