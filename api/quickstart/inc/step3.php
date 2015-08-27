<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Write to your Flybase App</h3>
	</div>
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