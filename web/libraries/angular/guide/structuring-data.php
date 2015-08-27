<?php
	$pclass = 'about-page';
	$pageTitle = 'Structuring Data | Web Development Guide | Helper Libraries | Developer Docs | ';
	include("../../../includes/header.php");	
?>
	<div class="headline-bg about-headline-bg"></div><!--//headline-bg-->         
	<!-- ******Video Section****** --> 
	<section class="story-section section section-on-bg">
		<h2 class="title container text-center">JavaScript Web Guide</h2>
		<div class="story-container container text-center"> 
			<div class="story-container-inner" >
				<div class="about">
<div class="text-center well">
	<h3>Structuring Data</h3>
	<hr />
	<p>This guide will cover some of the key concepts in data architecture and best practices for structuring JSON data in Flybase.</p>
</div>


<div class="docs-section">
  <p>
    Building properly structured NoSQL stores requires quite a bit of forethought. We need
    to understand, most importantly, how the data will be read back later, and how to
    make that process as easily as possible.
  </p>

  <h3 id="section-denormalizing-data">Avoid Building Nests</h3>


  <p>
    Because we can nest data up to 32 levels deep, it's tempting to think that this should be the
    default structure. However, when we fetch data for a document in Flybase, we also retrieve
    all of its child nodes. Therefore, in practice, it's best to keep things as flat as possible,
    just as one would structure SQL tables.
  </p>
  <p>
	  Consider the following badly nested structure:
  </p>

  <div class="alert alert-warning full-width">
    When we read data in Flybase, we also retrieve all of its children!
  </div>

		<pre><code class="language-javascript">
{
	// a poorly nested data architecture, because
	// iterating "rooms" to get a list of names requires
	// potentially downloading hundreds of megabytes of messages
	"rooms": {
		"one": {
			"name": "room alpha",
			"type": "private",
			"messages": {
				"m1": { "sender": "kstringer", "message": "foo" },
				"m2": { ... },
				// a very long list of messages
			}
		}
	}
}
		</code></pre>

  <p>
    With this nested design, iterating the data becomes problematic. Even a simple operation
    like listing the names of rooms requires that the entire <code>rooms</code> tree, including
    all members and groups, be downloaded to the client.
  </p>

</div>


<div class="docs-section">
  <h3 id="section-flatten">Flatten Your Data</h3>
  <p>
    If the data were instead split into separate collections (i.e. denormalized), it could be effeciently
    downloaded in segments, as it is needed. Consider this flattened architecture:
  </p>

	<pre><code class="language-javascript">
{
	// rooms contains only meta info about each room
	// stored under the room's unique ID
	"rooms": {
		"one": {
			"name": "room alpha",
			"type": "private"
		},
		"two": { ... },
		"three": { ... }
	},

	// room members are easily accessible (or restricted)
	// we also store these by room ID
	"members": {
		"one": {
			"kstringer": true,
			"bstringer": true
		},
		"two": { ... },
		"three": { ... }
	},

	// messages are separate from data we may want to iterate quickly
	// but still easily paginated and queried, and organized by room ID
	"messages": {
		"one": {
			"m1": { "sender": "kstringer", "message": "foo" },
			"m2": { ... },
			"m3": { ... }
		},
		"two": { ... },
		"three": { ... }
	}
}
	</code></pre>

  <p>
    It's now possible to iterate the list of rooms by only downloading a few bytes per room,
    quickly fetching meta data for listing or displaying rooms in a UI. Messages can be fetched
    separately and displayed as they arrive, allowing the UI to stay responsive and fast.
  </p>
</div>


<div class="docs-section">
  <h3 id="section-indices">Creating Data That Scales</h3>

  <p>
    A lot of times in building apps, it's preferable to download a subset of a list. This is
    particularly common if the list contains thousands of records or more. When this relationship
    is static, and one-directional, we can simply nest the child objects under the parent:
  </p>

	<pre><code class="language-javascript">
{
	"users": {
		"john": {
			"todoList": {
				"rec1": "Walk the dog",
				"rec2": "Buy milk",
				"rec3": "Win a gold medal in the Olympics"
			}
		}
	}
}
	</code></pre>

  <p>
    But often, this relationship is more dynamic, or it may be necessary to denormalize this data
    (John could have a more realistic todo list with a few thousand entries). This can often be
    solved by querying the list for a subset.
  </p>

  <p>
    But even this may be insufficient. Consider, for example, a two-way relationship between
    users and groups. Users can belong to a group and groups comprise a list of users. Since
    they cannot be nested both ways, a first attempt at this data structure would probably look this:
  </p>

	<pre style="border: 4px solid red;">
		<code class="language-javascript">
// A first attempt at a two-way relationship
{
	"users": {
		"kstringer": { "name": "Kaitlyn Stringer" },
		"jstringer": { "name": "Jackson Stringer" },
		"bstringer": { "name": "Bailey Stringer" }
	},
	"groups": {
		"alpha": {
			"name": "Alpha Tango",
			"members": {
				"m1": "kstringer",
				"m2": "jstringer",
				"m3": "bstringer"
			}
		},
		"bravo": { ... },
		"charlie": { ... }
	}
}
	</code></pre>

  <p>
    It's a start, but when it comes time to decide which groups a user belongs to, things get
    complicated. We can monitor all the groups and <strong>iterate them every time there is a change,
    but this is costly and slow</strong>.
  </p>

  <p>
    What we would like instead is an elegant way to list the groups Kaitlyn belongs to and
    fetch only data for those groups. An <em>index</em> of Kaitlyn's groups can help a
    great deal here:
  </p>

	<pre><code class="language-javascript">
// An index to track Kaitlyn's memberships
{
	"users": {
		"kstringer": {
			"name": "Kaitlyn Stringer",
			// index Kaitlyn's groups in her profile
			"groups": {
				// the value here doesn't matter, just that the key exists
				"alpha": true,
				"charlie": true
			}
		},
		...
	},
	"groups": { ... }
}
	</code></pre>

  <p>
    Didn't we just duplicate some data by storing the relationship under both Kaitlyn's record
    and under the group? We now have <code>kstringer</code> indexed under a group and <code>alpha</code>
    listed in Kaitlyn's profile. So in order to delete Kaitlyn from the group, it has to be updated in
    two places?
  </p>

  <p>
    Yes. This is a necessary redundancy for two-way relationships. It allows us
    to quickly and efficiently fetch Kaitlyn's memberships, even when the list of users or groups
    scales into the millions.
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