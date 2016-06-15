<?php
	/* @var $this \yii\web\View */
	/* @var $content string */

	use app\assets\AppAsset;
	use app\widgets\Alert;
	use yii\helpers\Html;
	use yii\widgets\Breadcrumbs;
	use yii\controllers\SiteController;
	use app\controllers\MessageController;
	use app\controllers\ProfileController;

	AppAsset::register($this);
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
				<a href='<?= Yii::$app->request->BaseUrl ?>' class="logo">
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
					  		<?php
					  			$baseUrl=Yii::$app->request->BaseUrl;
					  			if(!Yii::$app->user->isGuest){
					  				//don't have user detail
						  			if(($user=ProfileController::profileByUserId(Yii::$app->user->id))==null){
						  				$userName=Yii::$app->user->identity->username;
						  				$userImageUrl=$baseUrl . '/uploads/0.png';
						  				$userProfile='create';
						  			//have user detail
						  			}else{
						  				$userName=$user['name'];
						  				$userImageUrl=$baseUrl . "/" . $user['image'];
						  				$userProfile='view?id=' . $user['id'];	
						  			}
					  			}else{
					  				$userName="Guest";
					  			}
					  			//$newMessages=MessageController::newMessages($userId);
					  			//$numberOfNewMessages=count($newMessages);
					  			$numberOfNewMessages=4;
					  			if(!Yii::$app->user->isGuest){
					  				echo
							  		"<li class='dropdown messages-menu'>
										<a href='#' class='dropdown-toggle' data-toggle='dropdown'>
								  			<i class='fa fa-envelope-o'></i>
								  			<span class='label label-success'>$numberOfNewMessages</span>
										</a>
										<ul class='dropdown-menu'>
              								<li class='header'>You have $numberOfNewMessages new messages</li>
              								<li>
	                							<ul class='menu'>";
	                								/*foreach ($newMessages as $message) {
	                									$messageSubject=$message['subject'];
	                									$messageTime=$message['time'];
	                									$messageSenderId=$message['id_from'];
	                									$messageSender=UserDetailController::userById($messageSenderId);
	                									$senderUserName=$messageSender['first_name'] . " " . $messageSender['last_name'];
	                									$senderUserImage=$baseUrl . $messageSender['image'];
		                								echo"
								                  		<li>
								                    		<a href='#'>
								                      			<div class='pull-left'>
								                        			<img src=$senderUserImage class='img-circle' alt='User Image'>
								                      			</div>
								                      			<h4>
								                        			$senderUserName
								                        			<small><i class='fa fa-clock-o'></i> $messageTime</small>
								                      			</h4>
								                      			<p>$messageSubject</p>
								                    		</a>
								                  		</li>";
								                  	}*/
							                  	echo"
							                	</ul>
						                	</li>
						                	<li class='footer' style='padding: 0px; height: 30px;'><a href='#''>See All Messages</a></li>
						                </ul>
					 				</li>
				  					<li class='dropdown notifications-menu'>
										<a href='#''>
					 						<i class='fa fa-bell-o'></i>
					  						<span class='label label-warning'>10</span>
										</a>
									</li>
			  						<li>
										<a href='#''>
				  							<i class='fa fa-flag-o'></i>
				  							<span class='label label-danger'>9</span>
										</a>
									</li>";
								}
							?>

		  					<!-- User Account: style can be found in dropdown.less -->
      						<?php
      							$name=$userName;
      							if(!Yii::$app->user->isGuest){
      								echo
      								"<li class='dropdown user user-menu'>
    									<a href='#' class='dropdown-toggle' data-toggle='dropdown'>
      										<img src=$userImageUrl class='user-image' alt='User Image'>
      										<span class='hidden-xs'>" . $name . "</span>
  						 				</a>";
      							}else{
      								echo
      								"<li class='dropdown user user-menu'>
    									<a href='$baseUrl/login'>
    										<img src='$baseUrl/uploads/0.png' class='user-image' alt='User Image'>
      										<span class='hidden-xs'>" . $name . "</span>
  						 				</a>
  						 			</li>";
      							}
  							?>		
            					<ul class="dropdown-menu">
              						<!-- User image -->
              						<li class="user-header">
              							<?php
              								if(!Yii::$app->user->isGuest){
                								echo "<img src=$userImageUrl class='img-circle' alt='User Image'>";
                							}else{
                								echo "<img src='$baseUrl/uploads/0.png' class='user-image' alt='User Image'>";
                							}
            							?>
                						<p>
                							<?php
                								if(!Yii::$app->user->isGuest){
                 									//echo $name . " - " . $user['role'];
                 									echo $name . " - Software Developer";
                 								}
             								?>
                						</p>
              							<!-- Menu Footer-->
              							<?php
              								if(!Yii::$app->user->isGuest){
	              								echo 
	              								"<li class='user-footer'>
	                								<div class='pull-left'>
	                  									<a href='$baseUrl/profile/$userProfile' class='btn btn-default btn-flat'>Profile</a>
	                								</div>
	                								<div class='pull-right'>
	                  									<a href='$baseUrl/logout' class='btn btn-default btn-flat'>Logout</a>
	                								</div>
	                							</li>";
	                						}
                						?>
              						</li>
           						</ul>
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
							<?php
								if(!Yii::$app->user->isGuest){
									echo 
									"<div class='user-panel'>
 										<div class='pull-left image'>
	  										<img src='$userImageUrl' class='img-circle' alt='User Image'>
										</div>
										<div class='pull-left info'>
											<p>" . $name . "</p>
											<a><i class='fa fa-circle' style='color: green'></i> Online</a>	
										</div>
									</div>";
									echo 
      									"<form action='#' method='get' class='sidebar-form'>
					        				<div class='input-group'>
					          					<input type='text' name='q' class='form-control' placeholder='Search...'>
					              				<span class='input-group-btn'>
					                				<button type='submit' name='search' id='search-btn' class='btn btn-flat'><i class='fa fa-search'></i></button>
					             				</span>
					       					</div>
					     				</form>";
								}
							?>	
	  				</div>
	  				<!-- sidebar menu: : style can be found in sidebar.less -->
	  				<ul class="sidebar-menu">
						<?php
							if(!Yii::$app->user->isGuest){
								echo
								"<li class='header'>MAIN NAVIGATION</li>
								<li>
		  							<a href='#'>
										<i class='fa fa-dashboard'></i> <span>Dashboard</span>
		 							</a>
								</li>";
							}
						?>
						<li>
		  					<a href="<?= $baseUrl ?>">
								<i class="fa fa-home"></i>
								<span>Home</span>
		  					</a>
						</li>
						<?php 
							if(Yii::$app->user->can('employee')){
								echo
								"<li>
						  			<a href='$baseUrl/project/index'>
										<i class='fa fa-cubes'></i> <span>Projects</span>
										<small class='label pull-right bg-blue'>6</small>
						  			</a>
								</li>
								<li>
						  			<a href='$baseUrl/task/index'>
										<i class='fa fa-tasks'></i> <span>Tasks</span>
										<small class='label pull-right bg-yellow'>9</small>
						  			</a>
								</li>
								<li>
						  			<a href='$baseUrl/activity/index'>
										<i class='fa fa-check-square'></i> <span>Activities</span>
										<small class='label pull-right bg-red'>7</small>
						  			</a>
								</li>
								<li>
							  		<a href='#'>
										<i class='fa fa-envelope'></i> <span>Messages</span>
										<small class='label pull-right bg-green'>$numberOfNewMessages</small>
							  		</a>
								</li>";
							}
							if (Yii::$app->user->can('admin')){
								echo 
								"<li>
							  		<a href='$baseUrl/user/index'>
										<i class='fa fa-users'></i> <span>Users</span>
							  		</a>
								</li>
								<li>
							  		<a href='$baseUrl/profile/index'>
										<i class='fa fa-user'></i> <span>Profiles</span>
							  		</a>
								</li>";
							}
							if (Yii::$app->user->isGuest) {
								echo 
								"<li>
									<a href='$baseUrl/login'>
										<i class='fa fa-sign-in'></i> <span>Login</span>
									</a>
								</li>
								<li>
							  		<a href='$baseUrl/signup'>
										<i class='fa fa-user-plus'></i> <span>Signup</span>
							 		</a>
								</li>
								<li>
									<a href='$baseUrl/contact'>
										<i class='fa fa-envelope'></i> <span>Contact</span>
									</a>
								</li>
								<li>
									<a href='$baseUrl/about'>
										<i class='fa fa-question-circle'></i> <span>About</span>
									</a>
								</li>";	
							}
						?>
	  				</ul>
				</section>
  			</aside>
			<!-- Content Wrapper. Contains page content -->
  			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section>
					<?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
				</section>
				<!-- Main content -->
				<section class="content" style="min-height: 710px; padding-top: 0px">
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
