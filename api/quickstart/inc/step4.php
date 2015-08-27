<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Read from your Flybase App</h3>
	</div>
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