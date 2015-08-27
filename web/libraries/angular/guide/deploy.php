<?php
	$pclass = 'about-page';
	$pageTitle = 'Deploying Your App | Web Development Guide | Helper Libraries | Developer Docs | ';
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
	<h3>Deploying Your App</h3>
	<hr />
	<p>Your awesome Flybase app is almost ready to go into production! Before you put it out into the world, there are four important things you need to do:</p>
</div>


<?php
/*
<div class="docs-section">
	<h3>Secure Your App</h3>
	
	<p>
	Using our flexible Security and Flybase Rules language, you can easily define which users have read and write access to different parts of your app’s data. You can edit and test your rules directly in your Flybase Dashboard by clicking on the <strong>Security &amp; Rules</strong> tab. If you haven't added rules yet, check out the <a href="/docs/web/guide/understanding-security.html">Security section</a> of the guide to get started.
	</p>
	
	<div class="alert alert-error full-width">Without Security and Flybase Rules, your Flybase is globally writable and readable through the API.</div>
</div>

<div class="docs-section">
	<h3>Hosting Your Website</h3>
	
	<p>
		There are a few options for deploying your Flybase app:
	</p>
	
	<ul>
		<li>Our hosting service, <a href="/hosting.html">Flybase Hosting</a>, lets you deploy static assets (HTML, CSS, JS, images, etc.) to your own domain. It's CDN-backed and served over a secure SSL connection. Check out our <a href="/docs/hosting/quickstart.html">Hosting Quickstart Guide</a> to get started.</li>
		<li>If your Flybase app has server-side scripts, there are a variety of third-party hosting services you can use.</li>
	</ul>
</div>

<div class="docs-section">
	<h3>Whitelist Your Domain for Authentication</h3>
	
	<p>
		If you're using any authentication methods other than custom tokens in your app, make sure to whitelist your domain so that it can make login requests. All Flybases have <code>localhost</code> and <code>127.0.0.1</code> enabled by default. To add your domain, navigate to the <strong>Login &amp; Auth</strong> tab on your Flybase Dashboard and add your domain under <strong>Authorized Request Origins</strong>.
	</p>
</div>


<div class="docs-section">
	<h3>Upgrade Your Flybase Plan</h3>
	
	<p>
		Our Hacker Plan allows up to 50 concurrent connections, or simultaneous users on your application. If 50 users are currently connected and a 51st user attempts to connect to your app, the API will throw an error and any additional connections will fail. All of our <a href="/pricing/">paid plans</a> have no hard caps on usage and are recommended for production apps.
	</p>
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