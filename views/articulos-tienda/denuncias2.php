<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */

$this->title = 'Denuncia este articulo: ' . $model->nomArticulo;
$this->params['breadcrumbs'][] = ['label' => 'Articulostienda', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Denuncia';
?>
<div class="articulostienda-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_denuncia2', [
        'model' => $model, 'aviso' => $aviso,
    ]) ?>

</div>
