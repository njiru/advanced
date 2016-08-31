<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Specializations;
use backend\models\Doctors;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'patient_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->widget(
    DatePicker::className(), [
        'inline' => false, 
        'clientOptions' => [
        'autoclose' => true,
        'format' => 'yyyy-m-dd'
        ]
]);?>

    <!-- adding dropdownlist on specialization --> 
<?= $form->field($model, 'specialization_id')->dropDownList(
        ArrayHelper::map(Specializations::find()->all(), 'specialization_id', 'specialization_name'),
        [
            'prompt'=>'Select Specialist',
            'onchange'=>'
              $.post("index.php?r=doctors/lists&id='.'"+$(this).val(),function(data){
                    $("select#appointments-doctor_id").html(data);
                });'
        ]
    ) ?>

    <!-- adding dropdownlist on doctors -->
     <?= $form->field($model, 'doctor_id')->dropDownList(
      ArrayHelper::map(Doctors::find()->all(), 'doctor_id','doctors_name'),
        [
            'prompt' => 'Select Doctor', 
        ]
    ) ?>


    <?= $form->field($model, 'Reason')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
