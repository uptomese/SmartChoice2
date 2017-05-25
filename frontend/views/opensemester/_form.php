<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Semester;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Opensemester */
/* @var $form yii\widgets\ActiveForm */

$countries=Semester::find()->all();
$listData=ArrayHelper::map($countries,'id','semester_thai'); 
       
?>
<div class="opensemester-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'semester_id')->dropDownList($listData,['prompt'=>'กรุณาเลือกภาคเรียน']); ?>

    <?= $form->field($model, 'year')->widget(etsoft\widgets\YearSelectbox::classname(), [
        'yearStart' => -1,
        'yearEnd' => 1,
     ]);
    ?>
 
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
