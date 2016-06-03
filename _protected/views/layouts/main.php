<?php
	/* @var $this \yii\web\View */
	/* @var $content string */

	use app\assets\DashboardAsset;
	use app\widgets\Alert;
	use yii\helpers\Html;
	use yii\widgets\Breadcrumbs;
	use yii\controllers\SiteController;

	DashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700' rel='stylesheet' type='text/css'>
		<?php $this->head() ?>
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<?php $this->beginBody() ?>
		<div class="wrapper">
	  		<header class="main-header">
				<!-- Logo -->
				<a href="/~dejand/proman/" class="logo">
		  			<!-- mini logo for sidebar mini 50x50 pixels -->
		  			<span class="logo-mini"><b>PR</b>M</span>
		  			<!-- logo for regular state and mobile devices -->
		  			<span class="logo-lg"><b>PROJECT</b>MANAGER</span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
				  	</a>
				  	<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
					  		<!-- Messages: style can be found in dropdown.less-->
					  		<li class="dropdown messages-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						  			<i class="fa fa-envelope-o"></i>
						  			<span class="label label-success">4</span>
								</a>
								<ul class="dropdown-menu">
			  						<li class="header">You have 4 messages</li>
			  						<li>
										<!-- inner menu: contains the actual data -->
										<ul class="menu">
					  						<li><!-- start message -->
												<a href="#">
						  							<div class="pull-left">
														<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
						 							</div>
						  							<h4>
														Support Team
														<small><i class="fa fa-clock-o"></i> 22.02. 11:15</small>
						  							</h4>
						  							<p>Why not buy a new awesome theme?</p>
												</a>
					  						</li>
					  						<!-- end message -->
					  						<li>
												<a href="#">
											  		<div class="pull-left">
														<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
											  		</div>
											  		<h4>
														AdminLTE Design Team
														<small><i class="fa fa-clock-o"></i> 31.12 12:45</small>
											  		</h4>
											  		<p>Why not buy a new awesome theme?</p>
												</a>
										    </li>
										  	<li>
												<a href="#">
											  		<div class="pull-left">
														<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
											  		</div>
											  		<h4>
														Developers
														<small><i class="fa fa-clock-o"></i> Today</small>
											  		</h4>
											  		<p>Why not buy a new awesome theme?</p>
												</a>
										  	</li>
											<li>
												<a href="#">
												  	<div class="pull-left">
														<img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
												  	</div>
												  	<h4>
														Sales Department
														<small><i class="fa fa-clock-o"></i> Yesterday</small>
												  	</h4>
												  		<p>Why not buy a new awesome theme?</p>
												</a>
											</li>
											<li>
												<a href="#">
												  	<div class="pull-left">
														<img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
												  	</div>
												  	<h4>
														Reviewers
														<small><i class="fa fa-clock-o"></i> 2 days</small>
												  	</h4>
												  	<p>Why not buy a new awesome theme?</p>
												</a>
											</li>
								</ul>
			 				</li>
			  				<li class="footer"><a href="#">See All Messages</a></li>
						</ul>
		  </li>
		  <!-- Notifications: style can be found in dropdown.less -->
		  <li class="dropdown notifications-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <i class="fa fa-bell-o"></i>
			  <span class="label label-warning">10</span>
			</a>
			<ul class="dropdown-menu">
			  <li class="header">You have 10 notifications</li>
			  <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu">
				  <li>
					<a href="#">
					  <i class="fa fa-users text-aqua"></i> 5 new members joined today
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
					  page and may cause design problems
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-users text-red"></i> 5 new members joined
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-shopping-cart text-green"></i> 25 sales made
					</a>
				  </li>
				  <li>
					<a href="#">
					  <i class="fa fa-user text-red"></i> You changed your username
					</a>
				  </li>
				</ul>
			  </li>
			  <li class="footer"><a href="#">View all notifications</a></li>
			</ul>
		  </li>
		  <!-- Tasks: style can be found in dropdown.less -->
		  <li class="dropdown tasks-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <i class="fa fa-flag-o"></i>
			  <span class="label label-danger">9</span>
			</a>
			<ul class="dropdown-menu">
			  <li class="header">You have 9 tasks</li>
			  <li>
				<!-- inner menu: contains the actual data -->
				<ul class="menu">
				  <li><!-- Task item -->
					<a href="#">
					  <h3>
						Design some buttons
						<small class="pull-right">20%</small>
					  </h3>
					  <div class="progress xs">
						<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
						  <span class="sr-only">20% Complete</span>
						</div>
					  </div>
					</a>
				  </li>
				  <!-- end task item -->
				  <li><!-- Task item -->
					<a href="#">
					  <h3>
						Create a nice theme
						<small class="pull-right">40%</small>
					  </h3>
					  <div class="progress xs">
						<div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
						  <span class="sr-only">40% Complete</span>
						</div>
					  </div>
					</a>
				  </li>
				  <!-- end task item -->
				  <li><!-- Task item -->
					<a href="#">
					  <h3>
						Some task I need to do
						<small class="pull-right">60%</small>
					  </h3>
					  <div class="progress xs">
						<div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
						  <span class="sr-only">60% Complete</span>
						</div>
					  </div>
					</a>
				  </li>
				  <!-- end task item -->
				  <li><!-- Task item -->
					<a href="#">
					  <h3>
						Make beautiful transitions
						<small class="pull-right">80%</small>
					  </h3>
					  <div class="progress xs">
						<div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
						  <span class="sr-only">80% Complete</span>
						</div>
					  </div>
					</a>
				  </li>
				  <!-- end task item -->
				</ul>
			  </li>
			  <li class="footer">
				<a href="#">View all tasks</a>
			  </li>
			</ul>
		  </li>
		  <!-- User Account: style can be found in dropdown.less -->
		  <li class="dropdown user user-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
			  <span class="hidden-xs">Alexander Pierce</span>
			</a>
			<ul class="dropdown-menu">
			  <!-- User image -->
			  <li class="user-header">
				<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
				<p>
				  Alexander Pierce - Web Developer
				  <small>Member since Nov. 2012</small>
				</p>
			  </li>
			  <!-- Menu Footer-->
			  <li class="user-footer">
				<div class="pull-left">
				  <a href="#" class="btn btn-default btn-flat">Profile</a>
				</div>
				<div class="pull-right">
				  <a href="/~dejand/proman/site/logout" class="btn btn-default btn-flat">Sign out</a>
				</div>
			  </li>
			</ul>
		  </li>
		  <!-- Control Sidebar Toggle Button -->
		  <li>
			<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
		  </li>
		</ul>
	  </div>
	</nav>
 </header>
	<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
	  <!-- Sidebar user panel -->
	  <div class="user-panel">
		<div class="pull-left image">
		  <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
		  <p>Alexander Pierce</p>
		  <a><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	  </div>
	  <!-- search form -->
	  <form action="#" method="get" class="sidebar-form">
		<div class="input-group">
		  <input type="text" name="q" class="form-control" placeholder="Search...">
			  <span class="input-group-btn">
				<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
				</button>
			  </span>
		</div>
	  </form>
	  <!-- /.search form -->
	  <!-- sidebar menu: : style can be found in sidebar.less -->
	  <ul class="sidebar-menu">
		<li class="header">MAIN NAVIGATION</li>
		<li>
		  <a href="#">
			<i class="fa fa-dashboard"></i> <span>Dashboard</span>
		  </a>
		</li>
		<li>
		  <a href="#">
			<i class="fa fa-home"></i>
			<span>Home</span>
			<span class="label label-primary pull-right">4</span>
		  </a>
		</li>
		<li>
		  <a href="pages/widgets.html">
			<i class="fa fa-cubes"></i> <span>Projects</span>
			<small class="label pull-right bg-green">new</small>
		  </a>
		</li>
		<li>
		  <a href="#">
			<i class="fa fa-tasks"></i>
			<span>Tasks</span>
		  </a>
		</li>
		<li>
		  <a href="/~dejand/proman/user/index">
			<i class="fa fa-users"></i>
			<span>Users</span>
		  </a>
		</li>
		<li>
		  <a href="/~dejand/proman/contact">
			<i class="fa fa-envelope"></i> <span>Contact</span>
		  </a>
		</li>
		<li>
		  <a href="/~dejand/proman/about">
			<i class="fa fa-question-circle"></i> <span>About</span>
		  </a>
		</li>
		<li>
		  <a href="/~dejand/proman/login">
			<i class="fa fa-sign-in"></i> <span>Login</span>
		  </a>
		</li>
		<li>
		  <a href="/~dejand/proman/signup">
			<i class="fa fa-user-plus"></i> <span>Signup</span>
		  </a>
		</li>
		<li class="treeview">
		  <a href="#">
			<i class="fa fa-share"></i> <span>Multilevel</span>
			<i class="fa fa-angle-left pull-right"></i>
		  </a>
		  <ul class="treeview-menu">
			<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
			<li>
			  <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
			  <ul class="treeview-menu">
				<li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
				<li>
				  <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
				  <ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
					<li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
				  </ul>
				</li>
			  </ul>
			</li>
			<li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
		  </ul>
		</li>
		<li class="header">LABELS</li>
		<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
		<li><a href="#"><i class="fa fa-circle-o text-blue"></i> <span>Important</span></a></li>
		<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Important</span></a></li>
		<li><a href="#"><i class="fa fa-circle-o text-orange"></i> <span>Important</span></a></li>
		<li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>Important</span></a></li>
	  </ul>
	</section>
	<!-- /.sidebar -->
  </aside>
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section>
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?>
	</section>
	<!-- Main content -->
	<section class="content">
		<?= $content ?>
	</section>
	</div>
</div>

<footer class="footer">
	<div class="container">
		<p class="pull-left">&copy; <?= Yii::t('app', Yii::$app->name) ?> <?= date('Y') ?></p>
		<p class="pull-right"><?= Yii::powered() ?></p>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
