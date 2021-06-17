<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Regiones;

/* @var $this yii\web\View */
/* @var $model app\models\Regiones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regiones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clase_region')->dropDownList([
            'C' => 'Continente', 
            'P' => 'País',
            'E' => 'Estado']
        ) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region_id')->dropDownList(\yii\helpers\ArrayHelper::map(Regiones::find()->all(), 'id', 'nombre'), ['prompt' => 'Seleccione una región relacionada'], ['options'=>[0=>['Selected'=>true]]]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
