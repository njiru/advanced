<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Appointments;

/**
 * AppointmentsSearch represents the model behind the search form about `backend\models\Appointments`.
 */
class AppointmentsSearch extends Appointments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['appointment_id', 'specialization_id', 'doctor_id'], 'integer'],
            [['patient_name', 'email', 'date', 'Reason'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Appointments::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'appointment_id' => $this->appointment_id,
            'date' => $this->date,
            'specialization_id' => $this->specialization_id,
            'doctor_id' => $this->doctor_id,
        ]);

        $query->andFilterWhere(['like', 'patient_name', $this->patient_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'Reason', $this->Reason]);

        return $dataProvider;
    }
}
