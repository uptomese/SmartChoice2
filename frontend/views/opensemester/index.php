<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OpensemesterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Opensemesters';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opensemester-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Opensemester', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'semester.semester_thai',
            'year',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
