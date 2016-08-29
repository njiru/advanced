<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Specialization;

/* @var $this yii\web\View */
/* @var $model backend\models\Doctors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctors-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'specialization_id')->dropDownList(
        ArrayHelper::map(Specialization::find()->all(), 'specialization_id', 'specialization_name'),
        [
            'prompt' => 'Select Specialist',
            'onchange' => '
                $.post("index.php?r=specialization/lists&id='.'"+$(this).val(), function(data){
                    $("select#models-specialization").html(data);
                });'
        ]
    ) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
