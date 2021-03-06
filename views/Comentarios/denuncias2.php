<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */

$this->title = 'Denuncia este comentario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comentarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Denuncia';
?>
<div class="comentarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_denuncia2', [
        'model' => $model, 'aviso' => $aviso,
    ]) ?>

</div>
