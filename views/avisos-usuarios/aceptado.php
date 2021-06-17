<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AvisosUsuarios */

$this->title = 'Aceptar aviso: ' . $model->id;

?>
<div class="avisos-usuarios-aceptado">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo 'Hola'; ?>

    <?php $this->aceptado($model->id);
    $this->redirect(['view', 'id' => $model->id])
     ?>

</div>
