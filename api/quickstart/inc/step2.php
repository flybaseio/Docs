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