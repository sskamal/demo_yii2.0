<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $nom
 * @property int $prenom
 * @property string $date_birth
 * @property int $age
 * @property int $id_classrom
 *
 * @property Classroom $classrom
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nom', 'prenom', 'date_birth', 'age', 'id_classrom'], 'required'],
            [['age', 'id_classrom'], 'integer'],
            [['date_birth'], 'safe'],
            [['nom'], 'string', 'max' => 50],
            [['prenom'], 'string', 'max' => 50],
            [['id_classrom'], 'exist', 'skipOnError' => true, 'targetClass' => Classroom::className(), 'targetAttribute' => ['id_classrom' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom' => 'Nom',
            'prenom' => 'Prénom',
            'date_birth' => 'Date de naissance',
            'age' => 'Age',
            'id_classrom' => 'Classe',
        ];
    }

    /**
     * Gets query for [[Classrom]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClassrom()
    {
        return $this->hasOne(Classroom::className(), ['id' => 'id_classrom']);
    }
}
