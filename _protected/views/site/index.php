
<?php
use app\controllers\ProfileController;
use app\controllers\ProjectController;
use app\controllers\TaskController;
use app\controllers\ActivityController;
use app\controllers\ActivityProfileController;
use app\controllers\MessageController;
use app\controllers\ProjectProfileController;
use app\controllers\TaskProfileController;

/* @var $this yii\web\View */

$this->title = Yii::t('app', Yii::$app->name);
$baseUrl=Yii::$app->request->BaseUrl;
$imageUrl=Yii::$app->request->BaseUrl . "/uploads/proman.jpg";
//url
$projectsUrl=$baseUrl . "/project/index";
$taskUrl=$baseUrl . "/task/index";
$activitiesUrl=$baseUrl . "/activity/index";
$messagesUrl=$baseUrl . "/message/index";
//user
$user=ProfileController::profileByUserId(Yii::$app->user->id);
//numberOf
$numberOfProjects=ProjectController::numberOfProjects($user['id']);
$numberOfTasks=TaskController::numberOfTasks($user['id']);
$numberOfActivities=ActivityProfileController::numberOfActivitiesByUserId($user['id']);
$numberOfNewMessages=count(MessageController::newMessages(Yii::$app->user->identity->email));
?>

<div class="site-index">

    <!-- Smal boxes -->
    <div class="row" style="padding-top: 15px">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?= $numberOfProjects ?></h3>

              <p>Your active projects</p>
            </div>
            <div class="icon">
              <i class="ion ion-cube"></i>
            </div>
            <a href="<?= $projectsUrl ?>" class="small-box-footer">All projects <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $numberOfTasks ?></h3>

              <p>Your active tasks</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-toggle"></i>
            </div>
            <a href="<?= $taskUrl ?>" class="small-box-footer">All tasks <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $numberOfActivities ?></h3>

              <p>Your activities</p>
            </div>
            <div class="icon">
              <i class="ion ion-checkmark-circled"></i>
            </div>
            <a href="<?= $activitiesUrl ?>" class="small-box-footer">All activities <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $numberOfNewMessages ?></h3>

              <p>New messages</p>
            </div>
            <div class="icon">
              <i class="ion ion-email"></i>
            </div>
            <a href="<?= $messagesUrl ?>" class="small-box-footer">All messages <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>

<div class="row">
        <div class="col-md-6">
    <!-- Table Projects -->
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Projects</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th>Name</th>
              <th>Role</th>
            </tr>
            <?php
            	//projects
				$projects=ProjectProfileController::projectProfileByUserId($user['id']);
            	foreach ($projects as $project) {
            		$role=$project['role'];
            		$currentProject=ProjectController::findActiveProject($project['project_id']);
            		$name=$currentProject['name'];
            		$color=ProjectProfileController::colorOfRole($role);
            		echo
            		"<tr>
		              <td> $name </td>
		              <td><span class='label bg-$color'> $role </span></td>           
		            </tr>";
            	}
            ?>
          </table>
        </div>
        <!-- /.box-body -->
      </div>


       <!-- Table Tasks -->
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Tasks</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 200px">Project</th>
              <th style="width: 120px">Name</th>
              <th>Percentage</th>
              <th style="width: 50px">[ % ]</th>
              <th style="width: 100px">Role</th>
            </tr>
            <?php
            	$tasks=TaskProfileController::taskProfileByUserId($user['id']);
		        foreach ($tasks as $task) {
		        	$role=$task['role'];
		            $currentTask=TaskController::findActiveTask($task['task_id']);
		            $projectName=ProjectController::projectNameById($currentTask['project_id'])['name'];
		            $name=$currentTask['name'];
		            $percentage=intval($currentTask['percentage']);
		            $rolecolor=TaskProfileController::roleColor($role);
		            $color=TaskController::taskColor($currentTask);
		            if($currentTask!=null){
			        	echo
			            "<tr>
			              <td>$projectName</td>
			              <td>$name</td>
			              <td>
			                <div class='progress progress-xs'>
			                  <div class='progress-bar $color' style='width: $percentage%''></div>
			                </div>
			              </td>
			              <td>$percentage%</td>
			              <td><span class='label bg-$rolecolor'> $role </span></td>     
			            </tr>";
			        }
		        }
		    ?>
          </table>
        </div>
        <!-- /.box-body -->
      </div>

      </div>

<div class="col-md-6">

	<!-- Table Activities -->
    <div class="box">
        <div class="box-header">
          <h3 class="box-title">Activities</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
          <table class="table table-striped">
            <tr>
              <th style="width: 170px">Project</th>
              <th>Task</th>
              <th>Name</th>
              <th style="width: 70px">Time</th>
            </tr>
            <?php
            	$activities=ActivityProfileController::activitiesByUserId($user['id']);
            	foreach ($activities as $activity) {
            		$time=intval($activity['time']);
            		$currentActivity=ActivityController::activityById($activity['activity_id']);
            		$task=TaskController::taskNameById($currentActivity['task_id']);
                $taskName=$task['name'];
                $projectName=ProjectController::projectNameById($task['project_id'])['name'];
            		$name=$currentActivity['name'];
            		echo
            		"<tr>
                   <td>$projectName</td>
			             <td>$taskName</td>
			             <td>$name</td>
			             <td><small class='label label-primary'><i class='fa fa-clock-o'></i> $time hours</small></td>              
			           </tr>";
            	}
            ?>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
     

      </div>
      </div>
 
</div>

