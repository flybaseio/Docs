<?php
	$gactions = array(
		'1' => array(
			'title'=>'Installation & Setup',
			'content'=>'Create an account and install Flybase with just one line of code.',
			'url' => '/docs/web/guide/setup.html'
		),	
		'2' => array(
			'title'=>'Understanding Data',
			'content'=>'Learn about how data is stored in Flybase.',
			'url' => '/docs/web/guide/understanding-data.html'
		),	
		'3' => array(
			'title'=>'Saving Data',
			'content'=>'Learn how to save data to your Flybase apps.',
			'url' => '/docs/web/guide/saving-data.html'
		),	
		'4' => array(
			'title'=>'Reading Data',
			'content'=>'Read data from your Flybase apps with asynchronous listeners attached to Flybase references.',
			'url' => '/docs/web/guide/reading-data.html'
		),	
		'5' => array(
			'title'=>'Deleting Data',
			'content'=>'Learn how to delete documents stored in your Flybase apps.',
			'url' => '/docs/web/guide/deleting-data.html'
		),	
		'6' => array(
			'title'=>'Offline Capabilities',
			'content'=>'Tools for monitoring presence and synchronize local state with server state.',
			'url' => '/docs/web/guide/offline.html'
		),
		'7' => array(
			'title'=>'Deploying Your App',
			'content'=>'Three things to do before deploying your app.',
			'url' => '/docs/web/guide/deploy.html'
		),
/*
		'5' => array(
			'title'=>'Structuring Data',
			'content'=>'Key concepts in data architecture and best practices for structuring data in Flybase.',
			'url' => '/docs/web/guide/structuring-data.html'
		),	
*/
/*
		'6' => array(
			'title'=>'Understanding Security',
			'content'=>'This page describes how to build secure apps on Flybase.',
			'url' => '/docs/web/guide/security.html'
		),
*/
	);	
?>
<?php
/*
<section id="guidefooter">
	<div class="bar"></div>
	<div class="htimeline">
<?php 
	foreach($gactions as $n=>$action){
		$classn = '';
		if( $_SERVER['REQUEST_URI'] == $action['url'] ){
			$classn = 'active';
?>
		<div class="entry <?= $classn?> ">
			<h1><?= $n ?></h1>
			<h2><?= $action['title']?></h2>
		</div>
<?php
		}else{
?>
		<div class="entry <?= $classn?> ">
			<a href="<?= $action['url'] ?>">
				<h1><?= $n ?></h1>
			</a>
		</div>
<?php
		}	
	}	
?>
	</div>
</section>
*/
?>