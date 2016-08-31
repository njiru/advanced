<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property integer $doctor_id
 * @property string $doctors_name
 * @property string $email
 * @property integer $specialization_id
 *
 * @property Appointments[] $appointments
 * @property Appointments[] $appointments0
 * @property Specializations $specialization
 */
class Doctors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctors_name', 'email', 'specialization_id'], 'required'],
            [['specialization_id'], 'integer'],
            [['doctors_name'], 'string', 'max' => 20],
            ['email','email'],
            [['specialization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specializations::className(), 'targetAttribute' => ['specialization_id' => 'specialization_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'Doctor ID',
            'doctors_name' => 'Doctors Name',
            'email' => 'Email',
            'specialization_id' => 'Specialization ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(Appointments::className(), ['specialization_id' => 'specialization_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments0()
    {
        return $this->hasMany(Appointments::className(), ['doctor_id' => 'doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialization()
    {
        return $this->hasOne(Specializations::className(), ['specialization_id' => 'specialization_id']);
    }
}
