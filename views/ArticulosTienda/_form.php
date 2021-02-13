<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Articulostienda */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulostienda-form">

    <?php $form = ActiveForm::begin(); ?> 
	
	<?= $form->field($model, 'nomArticulo')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'articulo_id')->textInput(['readonly'=> true]) ?>
	
	<?= $form->field($model, 'nomTienda')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'tienda_id')->textInput(['readonly'=> true]) ?>

    <?= $form->field($model, 'imagen_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_articulo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'visible')->textInput()->dropdownList([
        0 => 'Invisible', 
        1 => 'Visible',
    ],
    ['prompt'=>'Selecciona visibilidad']) ?>

    <?= $form->field($model, 'cerrado')->textInput()->dropdownList([
        0 => 'Activo', 
        1 => 'Eliminado por solicitud de baja',
		2 => 'Suspendido',
		3 => 'Cancelado por Inadecuado'
    ],
    ['prompt'=>'Indicador de artículo cancelado']) ?>

    <?= $form->field($model, 'crea_usuario_id')->textInput() ?>

    <?= $form->field($model, 'modi_usuario_id')->textInput() ?>

    <?= $form->field($model, 'notas_admin')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
