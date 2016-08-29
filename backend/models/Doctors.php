<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "doctors".
 *
 * @property integer $doctor_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property integer $specialization_id
 *
 * @property Specialization $specialization
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
            [['first_name', 'last_name', 'email', 'specialization_id'], 'required'],
            [['specialization_id'], 'integer'],
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
            'doctor_id' => 'Doctor ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'specialization_id' => 'Specialization ID',
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
