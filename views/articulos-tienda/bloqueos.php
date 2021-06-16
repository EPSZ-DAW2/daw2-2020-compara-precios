<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */

$this->title = 'Bloquea este articulo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'ArticulosTienda', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Bloqueo';
?>
<div class="articulostienda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_bloqueo', [
        'model' => $model,
    ]) ?>

</div>
