<?php
	$pclass = 'about-page';
	$pageTitle = 'Web Development Guide | Helper Libraries | Developer Docs | ';
	include("../../../includes/header.php");	
/*
		<li>
		<a href="https://github.com/flybaseio/flybase-angularjs">
			<img src="/assets/img/angular-logo.svg" width=25 height=25 /> Angular
		</a> <small>- AngularJS Helper Library</small>
	</li>

	<a href="https://github.com/flybaseio/flybase-node">
	<a href="https://github.com/flybaseio/flybase-js">
*/
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
	<li class="active">Web Development Guide</li>
</ol>

<div class="text-center well">
	<h3>Web Development Guide</h3>
	<hr />
	<p>This is a step by step guide for developing web applications with Flybase. The guide provides in depth coverage for every core feature in Flybase and the recommended best practices to follow when developing your application.</p>
</div>


<?php
	$actions = array(
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
		'7' => array(
			'title'=>'Deploying Your App',
			'content'=>'Four things to do before deploying your app.',
			'url' => '/docs/web/guide/deploy.html'
		),
*/
	);	
?>
<ul class="timeline">
<?php
	$i = 0;
	foreach($actions as $k=>$action){
?>
		<li class="<?= ( $i % 2 ? 'timeline-inverted' : ''  ) ?>">
			<div class="timeline-badge"><?= $k ?></div>
			<div class="timeline-panel">
				<a href="<?= $action['url'] ?>">
					<div class="timeline-heading">
						<h4 class="timeline-title"><?= $action['title']?></h4>
					</div>
					<div class="timeline-body">
						<hr />
						<p><?=$action['content']?></p>
					</div>
				</a>
			</div>
		</li>
<?php
		$i++;
	}
?>
<!--
        <li class="timeline-inverted">
          <div class="timeline-badge warning"><i class="glyphicon glyphicon-credit-card"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Mussum ipsum cacilds</h4>
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
              <p>Suco de cevadiss, é um leite divinis, qui tem lupuliz, matis, aguis e fermentis. Interagi no mé, cursus quis, vehicula ac nisi. Aenean vel dui dui. Nullam leo erat, aliquet quis tempus a, posuere ut mi. Ut scelerisque neque et turpis posuere pulvinar pellentesque nibh ullamcorper. Pharetra in mattis molestie, volutpat elementum justo. Aenean ut ante turpis. Pellentesque laoreet mé vel lectus scelerisque interdum cursus velit auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac mauris lectus, non scelerisque augue. Aenean justo massa.</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Mussum ipsum cacilds</h4>
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Mussum ipsum cacilds</h4>
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Mussum ipsum cacilds</h4>
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
              <hr>
              <div class="btn-group">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-cog"></i> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Mussum ipsum cacilds</h4>
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
            </div>
          </div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-badge success"><i class="glyphicon glyphicon-thumbs-up"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Mussum ipsum cacilds</h4>
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
            </div>
          </div>
        </li>
-->
    </ul>

<?php
/*
1
Installation & Setup
Create an account and install Flybase with just one line of code.
2
Understanding Data
Learn about how data is stored in Flybase and its limitations and restrictions.
3
Saving Data
Four methods for writing data to Flybase.
4
Retrieving Data
Retrieve Flybase data with asynchronous listeners attached to Flybase references.
5
Structuring Data
Key concepts in data architecture and best practices for structing data in Flybase.
6
Understanding Security
This page describes how to build secure apps on Flybase.
7
User Authentication
Flybase handles user authentication and session management for you.
8
Offline Capabilities
Tools for monitoring presence and synchronize local state with server state.
9
Deploying Your App
Four things to do before deploying your app.

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