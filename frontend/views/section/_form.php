<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Course;
use app\models\Opensemester;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Section */
/* @var $form yii\widgets\ActiveForm */

$couraeAll = Course::find()->all();
$listCourse = ArrayHelper::map($couraeAll, 'id', 'course_name');
//----------------------------- ----------------------------

?>

<div class="section-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'section_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'course_id')->dropDownList($listCourse, ['prompt' => 'กรุณาเลือกรายวิชา']); ?>
    
    <?=
            $form->field($model, 'opensemester_id')
            ->dropDownList(ArrayHelper::map(Opensemester::find()->all(), 'id', 'semester.semester_thai','year'),['prompt' => 'ปีการศึกษา,ภาคเรียน'])
            ->label('ปีการศึกษา')
    ?>
    <br>
    <div class="row">
        <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Answer</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 100, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsAnswer[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'question',
                    'answer',
                ],
            ]); ?>
            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelsAnswer as $i => $modelAnswer): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left"><?php echo "ข้อที่ .."; ?>  </h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelAnswer->isNewRecord) {
                                echo Html::activeHiddenInput($modelAnswer, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelAnswer, "[{$i}]question")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelAnswer, "[{$i}]answer")->dropDownList([ 'A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D',], ['prompt' => 'เลือกข้อที่ถูกต้อง']) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
        </div>
    </div>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
