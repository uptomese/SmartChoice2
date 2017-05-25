<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use app\models\AnswerSearch;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Section', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'export' => false,
        'pjax' => true,
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new AnswerSearch();
                    $searchModel->section_id = $model->id;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                    
                    return Yii::$app->controller->renderPartial('_answer',[
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                },
            ],
                        
            'section_value',
            'course.course_name',
            [
                'attribute' => 'ภาคเรียน',
                'value' => function($model){return $model->opensemester->semester->semester_thai;},
            ],
            'opensemester.year',
            'create',
                        
            ['class' => 'yii\grid\ActionColumn'],                     
        ],
    ]); ?>
</div>
