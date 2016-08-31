<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AppointmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Appointments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appointments-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'appointment_id',
            'patient_name',
            'email:email',
            'date',
          //  [
        //    'attribute'=>'date',
          //      'value'=>'date',
            //    'format'=>'raw',
              //  'filter'=>DatePicker::widget([
                //        'model' => $searchModel,
                  //      'attribute' => 'date',
                    //        'clientOptions' => [
                      //          'autoclose' => true,
                        //        'format' => 'yyyy-m-dd'
                          //  ]
                   // ])
            //],
            //'specialization_id',
            // 'doctor_id',
            // 'Reason:ntext',
        ],
    ]); ?>
</div>
