<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Student;

/**
 * StudentSearch represents the model behind the search form of `app\models\Student`.
 */
class StudentSearch extends Student
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'age'], 'integer'],
            [['prenom'], 'string'],
            [['nom', 'date_birth', 'id_classrom'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Student::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 5 ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('classrom');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'prenom' => $this->prenom,
            'date_birth' => $this->date_birth,
            'age' => $this->age,
           // 'id_classrom' => $this->id_classrom,
        ]);

       $query->andFilterWhere(['like', 'student.nom', $this->nom]);
        $query->andFilterWhere(['like', 'classroom.nom', $this->id_classrom]);

        return $dataProvider;
    }
}
