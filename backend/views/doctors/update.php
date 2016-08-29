<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Doctors */

$this->title = 'Update Doctors: ' . $model->doctor_id;
$this->params['breadcrumbs'][] = ['label' => 'Doctors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->doctor_id, 'url' => ['view', 'id' => $model->doctor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
