<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Opensemester */

$this->title = 'Update Opensemester: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Opensemesters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'semester_id' => $model->semester_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="opensemester-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
