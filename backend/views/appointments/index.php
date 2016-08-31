<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppointmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Appointments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'appointment_id',
            'patient_name',
            'email:email',
            'date',
            [
                'attribute'=>'date',
                'value'=>'date',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'date',
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-m-dd'
                            ]
                    ])
            ],
            'specialization_id',
            // 'doctor_id',
            // 'Reason:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
