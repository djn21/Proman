<?php

namespace app\controllers;

use Yii;
use app\models\Task;
use app\models\TaskSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\TaskProfileController;

/**
 * TaskController implements the CRUD actions for Task model.
 */
class TaskController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf', 'add-activity', 'add-task-profile'],
                        'roles' => ['admin']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'pdf'],
                        'roles' => ['employee']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Task models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TaskSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerActivity = new \yii\data\ArrayDataProvider([
            'allModels' => $model->activities,
        ]);
        $providerTaskProfile = new \yii\data\ArrayDataProvider([
            'allModels' => $model->taskProfiles,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerActivity' => $providerActivity,
            'providerTaskProfile' => $providerTaskProfile,
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($model->loadAll(Yii::$app->request->post(), ['']) && $model->saveAll([''])) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post(), ['']) && $model->saveAll([''])) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * for export pdf at actionView
     *  
     * @param type $id
     * @return type
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);
        $providerActivity = new \yii\data\ArrayDataProvider([
            'allModels' => $model->activities,
        ]);
        $providerTaskProfile = new \yii\data\ArrayDataProvider([
            'allModels' => $model->taskProfiles,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerActivity' => $providerActivity,
            'providerTaskProfile' => $providerTaskProfile,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }
    
    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Activity
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddActivity()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Activity');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formActivity', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for TaskProfile
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddTaskProfile()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('TaskProfile');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formTaskProfile', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function findActiveTask($id)
    {
        $percent=100.00;
        return Task::find()->where(['id'=>$id])->andWhere(['<>','percentage', $percent])->one();
    }

    public function numberOfTasks($userid){
        $tasks=TaskProfileController::tasksByUserId($userid);
        $numberOfTasks=0;
        foreach ($tasks as $task) {
            $currentTask=TaskController::findActiveTask($task);
            if($currentTask!=null){
                $numberOfTasks++;
            }
        }
        return $numberOfTasks;
    }

    public function taskColor($task){
        $taskColor='progress-bar-aqua';
        $today=date('Y-m-d');
        if($task['start_date']<$today){
            $taskColor='progress-bar-green';
        }
        if($task['end_date']<$today){
            $taskColor='progress-bar-yellow';
        }
        if($task['dead_line']<$today){
            $taskColor='progress-bar-red';
        }
        return $taskColor;
    }

    public function numberOfnotifications($userid){
        $tasks=TaskProfileController::tasksByUserId($userid);
        $numberOfNotifications=0;
        foreach ($tasks as $task) {
            $currentTask=TaskController::findActiveTask($task);
            $date1=date_create(date('Y-m-d'));
            $date2=date_create($currentTask['start_date']);
            $diff=date_diff($date1,$date2);
            $diffDays=$diff->format("%R%a");
            if($diffDays>0 && $diffDays<=5){
                $numberOfNotifications++;
            }
            $date2=date_create($currentTask['dead_line']);
            $diff=date_diff($date1,$date2);
            $diffDays=$diff->format("%R%a");
            if($diffDays>0 && $diffDays<=5){
                $numberOfNotifications++;
            }
        }
        return $numberOfNotifications;
    }

    public function taskNameById($id){
        return Task::find()->where(['id'=>$id])->one();
    }

}
