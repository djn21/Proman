<?php

namespace app\controllers;

use Yii;
use app\models\Project;
use app\models\ProjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\controllers\ProjectProfileController;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf', 'add-expence', 'add-income', 'add-project-profile', 'add-task'],
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
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerExpence = new \yii\data\ArrayDataProvider([
            'allModels' => $model->expences,
        ]);
        $providerIncome = new \yii\data\ArrayDataProvider([
            'allModels' => $model->incomes,
        ]);
        $providerProjectProfile = new \yii\data\ArrayDataProvider([
            'allModels' => $model->projectProfiles,
        ]);
        $providerTask = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tasks,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerExpence' => $providerExpence,
            'providerIncome' => $providerIncome,
            'providerProjectProfile' => $providerProjectProfile,
            'providerTask' => $providerTask,
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Project();

        if ($model->loadAll(Yii::$app->request->post(), ['']) && $model->saveAll([''])) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Project model.
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
     * Deletes an existing Project model.
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
        $providerExpence = new \yii\data\ArrayDataProvider([
            'allModels' => $model->expences,
        ]);
        $providerIncome = new \yii\data\ArrayDataProvider([
            'allModels' => $model->incomes,
        ]);
        $providerProjectProfile = new \yii\data\ArrayDataProvider([
            'allModels' => $model->projectProfiles,
        ]);
        $providerTask = new \yii\data\ArrayDataProvider([
            'allModels' => $model->tasks,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerExpence' => $providerExpence,
            'providerIncome' => $providerIncome,
            'providerProjectProfile' => $providerProjectProfile,
            'providerTask' => $providerTask,
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
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Expence
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddExpence()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Expence');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formExpence', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Income
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddIncome()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Income');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formIncome', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for ProjectProfile
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddProjectProfile()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ProjectProfile');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formProjectProfile', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Task
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddTask()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Task');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formTask', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function projectNameById($projectid){
        return Project::find()->where(['id'=>$projectid])->one();
    }

    public function findActiveProject($id)
    {
        $status='Active';
        return Project::find()->where(['id'=>$id])->andWhere(['status'=>$status])->one();
    }


    public function numberOfProjects($userid){
        $projects=ProjectProfileController::projectsByUserId($userid);
        $numberOfProjects=0;
        foreach ($projects as $project) {
            $currentProject=ProjectController::findActiveProject($project);
            if($currentProject!=null){
                $numberOfProjects++;
            }
        }
        return $numberOfProjects;
    }

    public function numberOfnotifications($userid){
        $projects=ProjectProfileController::projectsByUserId($userid);
        $numberOfNotifications=0;
        foreach ($projects as $project) {
            $currentProject=ProjectController::findActiveProject($project);
            $date1=date_create(date('Y-m-d'));
            $date2=date_create($currentProject['start_date']);
            $diff=date_diff($date1,$date2);
            $diffDays=$diff->format("%R%a");
            if($diffDays>0 && $diffDays<=5){
                $numberOfNotifications++;
            }
            $date2=date_create($currentProject['dead_line']);
            $diff=date_diff($date1,$date2);
            $diffDays=$diff->format("%R%a");
            if($diffDays>0 && $diffDays<=5){
                $numberOfNotifications++;
            }
        }
        return $numberOfNotifications;
    }

}
