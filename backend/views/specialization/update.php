<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Specialization */

$this->title = 'Update Specialization: ' . $model->specialization_id;
$this->params['breadcrumbs'][] = ['label' => 'Specializations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->specialization_id, 'url' => ['view', 'id' => $model->specialization_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="specialization-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
