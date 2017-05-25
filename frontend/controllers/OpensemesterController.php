<?php

namespace frontend\controllers;

use Yii;
use app\models\Opensemester;
use app\models\OpensemesterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OpensemesterController implements the CRUD actions for Opensemester model.
 */
class OpensemesterController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Opensemester models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OpensemesterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Opensemester model.
     * @param integer $id
     * @param integer $semester_id
     * @return mixed
     */
    public function actionView($id, $semester_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $semester_id),
        ]);
    }

    /**
     * Creates a new Opensemester model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Opensemester();

        if ($model->load(Yii::$app->request->post())) {
            //$model->year = aaa;
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->id, 'semester_id' => $model->semester_id]);
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Opensemester model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $semester_id
     * @return mixed
     */
    public function actionUpdate($id, $semester_id)
    {
        $model = $this->findModel($id, $semester_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'semester_id' => $model->semester_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Opensemester model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $semester_id
     * @return mixed
     */
    public function actionDelete($id, $semester_id)
    {
        $this->findModel($id, $semester_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Opensemester model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $semester_id
     * @return Opensemester the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $semester_id)
    {
        if (($model = Opensemester::findOne(['id' => $id, 'semester_id' => $semester_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
