<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Project;
use app\models\Task;
use app\models\Activity;
use app\models\ProjectProfile;
use app\models\TaskProfile;
use app\models\ActivityProfile;
use app\models\Profile;
use app\models\Income;
use app\models\Expence;

/**
 * SoapServiceController web services
 */
class SoapServiceController extends Controller
{	
	/**
	* Define service
	*/
	public function actions()
	{
		return [
			'service' => ['class' => 'mongosoft\soapserver\Action'],
		];
	}

	/**
	* Returns all projects
	* @param none
	* @return mixed
	* @soap
	*/
	public function getAllProjects()
	{	
		return Project::find()->AsArray()->all();
	}
	
	/**
	* Returns all tasks
	* @param none
	* @return array
	* @soap
	*/
	public function getAllTasks()
	{	
		return Task::find()->AsArray()->all();
	}

	/**
	* Returns all tasks  on project
	* @param none
	* @return array
	* @soap
	*/
	public function getAllTasksOnProject($projectid)
	{	
		return Task::find()->where(["project_id"=>$projectid])->AsArray()->all();
	}

	/**
	* Returns all activites
	* @param none
	* @return array
	* @soap
	*/
	public function getAllActivities()
	{	
		return Activity::find()->AsArray()->all();
	}

	/**
	* Returns all activites on project
	* @param none
	* @return array
	* @soap
	*/
	public function getAllActivitiesOnTask($taskid)
	{	
		$activites=Activity::find()->where(['task_id'=>$taskid])->AsArray()->all();
		$result=array();
		foreach ($activites as $activity) {
			$activityProfiles=ActivityProfile::find()->where(['activity_id'=>$activity['id']])->AsArray()->all();
			foreach ($activityProfiles as $activityProfile) {
				$profile=Profile::findOne($activityProfile['profile_id']);
				$id=$activityProfile['id'];
				$name=$activity['name'];
				$user=$profile['name'];
				$time=$activityProfile['time'];
				$note=$activity['note'];
				array_push($result, array("id"=>$id, "name"=>$name, "user"=>$user, "time"=>$time, "note"=>$note));
			}
		}
		return $result;
	}

	/**
	* Returns all users on project
	* @param none
	* @return array
	* @soap
	*/
	public function getAllUsersOnProject($projectid)
	{	
		$projectProfiles=ProjectProfile::find()->where(['project_id'=>$projectid])->AsArray()->all();
		$projectUsers=array();
		foreach ($projectProfiles as $projectProfile) {
			$profile=Profile::findOne($projectProfile['profile_id']);
			$id=$projectProfile['id'];
			$name=$profile['name'];
			$role=$projectProfile['role'];
			array_push($projectUsers,array("id"=>$id, "name"=>$name, "role"=>$role));
		}
		return $projectUsers;
	}

	/**
	* Returns all users on task
	* @param none
	* @return array
	* @soap
	*/
	public function getAllUsersOnTask($taskid)
	{	
		$taskProfiles=TaskProfile::find()->where(['task_id'=>$taskid])->AsArray()->all();
		$taskUsers=array();
		foreach ($taskProfiles as $taskProfile) {
			$profile=Profile::findOne($taskProfile['profile_id']);
			$id=$taskProfile['id'];
			$name=$profile['name'];
			$role=$taskProfile['role'];
			array_push($taskUsers,array("id"=>$id, "name"=>$name, "role"=>$role));
		}
		return $taskUsers;
	}

	/**
	* Returns all incomes on project
	* @param none
	* @return array
	* @soap
	*/
	public function getAllIncomesOnProject($projectid)
	{	
		return Income::find()->where(['project_id'=>$projectid])->AsArray()->all();
	}

	/**
	* Returns all incomes on project
	* @param none
	* @return array
	* @soap
	*/
	public function getAllExpencesOnProject($projectid)
	{	
		return Expence::find()->where(['project_id'=>$projectid])->AsArray()->all();
	}	

}