<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Etiquette;

/* @var $this yii\web\View */
/* @var $model app\models\Produit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

   

    <?php
    echo Select2::widget([
        'model' => $model,
        'name' => 'etiquettes',
        'attribute' => 'etiquettes',
        'data' => ArrayHelper::map(Etiquette::find()->orderBy('description')->all(),'id','description'),  //['1'=>'1','2'=>2],
        'options' => [
            'placeholder' => 'Select etiquettes ...',
            'multiple' => true
    ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
