<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\models\AppointmentsSearch;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DoctorsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doctors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctors-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Doctors', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
             [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel                    = new AppointmentsSearch();
                    $searchModel->doctor_id    = $model->doctor_id;
                    $dataProvider                   = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_docAppoints', [
                        'searchModel'  => $searchModel,
                        'dataProvider' => $dataProvider
                    ]);
                },
            ],
            //'doctor_id',
            'doctors_name',
            'email:email',
            'specialization_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
