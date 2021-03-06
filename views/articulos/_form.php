<?php

use app\models\Articulos;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Articulos */
/* @var $form yii\widgets\ActiveForm */

/*
        if ($model->isNewRecord) {
     no previously db data loaded -
     new instance of model (new data not saved yet)
    }
        */
         

?>

<div class="articulos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 2,'placeholder'=>'El nombre completo'])->label("El nombre de articulo") ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'categoria_id')->dropDownList($categorias)->label("Elije una categoría")?>

    <?php // $form->field($model, 'imagen_id')->textInput(['maxlength' => true]) ?>
    <?= $form->field($imagen, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'visible')->checkBox()?>

    <?= $form->field($model, 'cerrado')->dropDownList(Articulos::get_estados())->label("Estado del Artículo")?>

    <?= $form->field($model, 'comun')->dropDownList(Articulos::get_comun()) ?>

    <?= $form->field($model, 'crea_usuario_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'crea_fecha')->hiddenInput()->label(false)?>

    <?= $form->field($model, 'modi_usuario_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'modi_fecha')->hiddenInput()->label(false)?>

    <?= $form->field($model, 'notas_admin')->textarea(['rows' => 2]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    
    <?php ActiveForm::end(); 

    //checkboxList(['0'=>'Invisible','1'=>'Visib'])->label('Visible/Invisible')
    //$form->field($model, 'visible')->dropdownList(array('0'=>'Invisbile','1'=>'Visible'))->label("Elije un estado")?>

    
</div>
