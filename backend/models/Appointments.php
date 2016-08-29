<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "appointmentBooking".
 *
 * @property integer $appointment_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $date
 * @property integer $specialization_id
 * @property integer $doctor_id
 * @property string $Reason
 *
 * @property Specialization $specialization
 */
class Appointments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointmentBooking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'date', 'specialization_id', 'doctor_id', 'Reason'], 'required'],
            [['date'], 'safe'],
            [['specialization_id', 'doctor_id'], 'integer'],
            [['Reason'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
            [['specialization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specialization::className(), 'targetAttribute' => ['specialization_id' => 'specialization_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'appointment_id' => 'Appointment ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
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
        return $this->hasOne(Specialization::className(), ['specialization_id' => 'specialization_id']);
    }
}
