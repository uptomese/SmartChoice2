<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\PersonStatus;


/* @var $this yii\web\View */
/* @var $model app\models\Person */
/* @var $form yii\widgets\ActiveForm */
$countries=PersonStatus::find()->all();
$listData=ArrayHelper::map($countries,'id','status_thai'); 
?>

<div class="person-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status_id')->dropDownList($listData,['prompt'=>'สถานะ']); ?>

    <?= $form->field($model, 'person_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'person_title')->dropDownList([ 'นาย' => 'นาย', 'นางสาว' => 'นางสาว', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'person_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'person_lastname')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
