<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produit".
 *
 * @property int $id
 * @property string $description
 * @property string $etiquettes
 */
class Produit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description', 'etiquettes'], 'required'],
            [['description', 'etiquettes'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
            'etiquettes' => 'Etiquettes',
        ];
    }
}
