<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Specialization;
//use backend\models\Doctors;

/* @var $this yii\web\View */
/* @var $model backend\models\Appointments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="appointments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'specialization_id')->dropDownList(
        ArrayHelper::map(Specialization::find()->all(), 'specialization_id', 'specialization_name'),
        [
            'prompt'=>'Select Specialist',
            'onchange'=>'
              $.post("index.php?r=specialization/lists&id='.'"+$(this).val(),function(data){
                    $("select#appointments-specialization_specialization_id").html(data);
                });'
        ]
    ) ?>

    <!-- <?= $form->field($model, 'doctor_id')->dropDownList(
      //ArrayHelper::map(Doctors::find()->all(), 'doctor_id','last_name'),
        [
        //    'prompt' => 'Select Doctor', 
        ]
    ) ?>
    -->

    <?= $form->field($model, 'Reason')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
