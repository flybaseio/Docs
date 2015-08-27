<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Further Reading</h3>
	</div>
	<div class="panel-body">

		<p>Since this <code>$resource-like</code> implementation is based on <code>$http</code> and returns a promise.</p>
		
		<p>Each resource created with the <code>$flybaseResourceHttp</code> will be equipped with the following methods:</p>
		
		<ul>
			<li> on the class level:
				<ul>
				    <li> <code>Resource.all([options])</code></li>
				    <li> <code>Resource.query(criteriaObject,[options])</code></li>
				    <li> <code>Resource.getById(idString)</code></li>
				    <li> <code>Resource.getByIds(idsArray)</code></li>
				    <li> <code>Resource.count(criteriaObject)</code></li>
				    <li> <code>Resource.distinct(fieldName, criteriaObject)</code></li>
				</ul>
			</li>
			<li> on an instance level:
				<ul>
				    <li> <code>resource.$id()</code></li>
				    <li> <code>resource.$save()</code></li>
				    <li> <code>resource.$update()</code></li>
				    <li> <code>resource.$saveOrUpdate()</code></li>
				    <li> <code>resource.$remove()</code></li>
				</ul>
			</li>
		</ul>
		
		<p>Resource <code>all</code> and <code>query</code> supported options:</p>
		
		<ul>
			<li> <code>sort</code>: ex.: <code>Resource.all({ sort: {priority: 1} });</code></li>
			<li> <code>limit</code>: ex.: <code>Resource.all({ limit: 10 });</code></li>
			<li> <code>fields</code>: <code>1</code> - includes a field, <code>0</code> - excludes a field, ex.: <code>Resource.all({ fields: {name: 1, notes: 0} });</code></li>
			<li> <code>skip</code>: ex.: <code>Resource.all({ skip: 10 });</code></li>
		</ul>
		
		<p>You also have access to all the usual Flybase javascript commands through the <code>Flybase</code> object:</p>
		 	
		<pre><code class="language-javascript">
var ref = Project.flybase();
		</code></pre>
		
	</div>
</div>