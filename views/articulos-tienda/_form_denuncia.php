<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulostienda-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomTienda')->textInput(['disabled' => true]) ?>
	
	<?= $form->field($model, 'nomArticulo')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'notas_denuncia')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar cambios', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
