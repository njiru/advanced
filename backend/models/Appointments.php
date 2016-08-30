<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "appointments".
 *
 * @property integer $appointment_id
 * @property string $patient_name
 * @property string $email
 * @property string $date
 * @property integer $specialization_id
 * @property integer $doctor_id
 * @property string $Reason
 *
 * @property Doctors $specialization
 * @property Doctors $doctor
 */
class Appointments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_name', 'email', 'date', 'specialization_id', 'doctor_id', 'Reason'], 'required'],
            [['date'], 'safe'],
            [['specialization_id', 'doctor_id'], 'integer'],
            [['Reason'], 'string'],
            [['patient_name'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            [['specialization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctors::className(), 'targetAttribute' => ['specialization_id' => 'specialization_id']],
            [['doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Doctors::className(), 'targetAttribute' => ['doctor_id' => 'doctor_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'appointment_id' => 'Appointment ID',
            'patient_name' => 'Patient Name',
            'email' => 'Email',
            'date' => 'Date',
            'specialization_id' => 'Specialization ID',
            'doctor_id' => 'Doctor ID',
            'Reason' => 'Reason',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialization()
    {
        return $this->hasOne(Doctors::className(), ['specialization_id' => 'specialization_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDoctor()
    {
        return $this->hasOne(Doctors::className(), ['doctor_id' => 'doctor_id']);
    }
}
