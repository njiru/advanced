<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SpecializationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Specializations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="specialization-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Specialization', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'specialization_id',
            'specialization_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
