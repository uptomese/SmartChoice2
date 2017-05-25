<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Opensemester */

$this->title = 'Create Opensemester';
$this->params['breadcrumbs'][] = ['label' => 'Opensemesters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opensemester-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
