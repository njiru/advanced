<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Doctors;

/* @var $this yii\web\View */
/* @var $model backend\models\Specializations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="specializations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'specialization_name')->textInput(['maxlength' => true]) ?>

    <!-- Create doctor for this speciality  -->
    <?= $form->field($doctors, 'doctors_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($doctors, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
