<div role="tabpanel" class="tab-pane fade" id="s5">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">
				<span class="badge numb">6</span> 
				Processing Data
			</h3>
		</div>
		<div class="panel-body">
			<h4>Now we need to display the chat messages on the page.</h4>
			<p>For each chat message, Flybase will call your callback with a snapshot containing the message's data.</p>
			<p>Extract the message data from the snapshot by calling the value() function and assign it to a variable. Then, call the displayChatMessage() function to display the message as shown:</p>

			<pre><code class="language-javascript">
var message = data.value();
displayChatMessage(message.name, message.text);
			</code></pre>

			<p>Your file should look like this:</p>

			<pre><code class="language-markup">
&lt;html>
&lt;head>
	&lt;script src="http://cdn.flybase.io/flybase.js">&lt;/script>
	&lt;script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'>&lt;/script>
&lt;/head>
&lt;body>
	&lt;div id='messagesDiv'>&lt;/div>
	&lt;input type='text' id='nameInput' placeholder='Name'>
	&lt;input type='text' id='messageInput' placeholder='Message'>
	&lt;script>
		var myDataRef = new Flybase("74k8064f-cd6f-4c07-8baf-b1d241496eec", "tutorial", "chat");
		myDataRef.on('value', function (data) {
			var messages = data.value();
			for (var i in messages) {
				var message = messages[i];
				displayChatMessage(message.name, message.text);
			}
		});
		$('#messageInput').keypress(function (e) {
			if (e.keyCode == 13) {
				var name = $('#nameInput').val();
				var text = $('#messageInput').val();
				myDataRef.set( {name:name, text:text} );
				$('#messageInput').val('');
			}
		});
		myDataRef.on('child_added', function(data) {
			var message = data.value();
			displayChatMessage(message.name, message.text);
		});
		function displayChatMessage(name, text) {
			$('&lt;div/>').text(text).prepend($('&lt;em/>').text(name+': ')).appendTo($('#messagesDiv'));
			$('#messagesDiv')[0].scrollTop = $('#messagesDiv')[0].scrollHeight;
		}
	&lt;/script>
&lt;/body>
&lt;/html>
			</code></pre>

			<h4>Congratulations! You've completed the guided portion of this tutorial.</h4>

			<p>You've now learned how to use Flybase to build a web-based chat page that you can use to talk to your friends.<p>
			<Hr />

			<p>Thanks for taking our tutorial! If you liked it, we'd really appreciate a <iframe allowtransparency="true" frameborder="0" scrolling="no" src="https://platform.twitter.com/widgets/tweet_button.html?url=https%3A%2F%2Fwww.flybase.io%2Ftutorial%2F&amp;text=I%20just%20built%20an%20app%20in%205%20minutes%20with%20%40flybase!&amp;count=none" style="width:60px; height:20px;"></iframe>
		</div>
		<br />
	</div>
	<br />
</div>