<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "specialization".
 *
 * @property integer $specialization_id
 * @property string $specialization_name
 *
 * @property AppointmentBooking[] $appointmentBookings
 * @property Doctors[] $doctors
 */
class Specialization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'specialization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['specialization_name'], 'required'],
            [['specialization_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'specialization_id' => 'Specialization ID',
            'specialization_name' => 'Specialization Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointmentBookings()
    {
        return $this->hasMany(AppointmentBooking::className(), ['specialization_id' => 'specialization_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctors()
    {
        return $this->hasMany(Doctors::className(), ['specialization_id' => 'specialization_id']);
    }
}
