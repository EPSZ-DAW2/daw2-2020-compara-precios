<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Oferta */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ofertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="oferta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'articulo_id',
            'tienda_id',
            'texto:ntext',
            'fecha_desde',
            'fecha_hasta',
            'precio_oferta',
            'precio_original',
            'crea_usuario_id',
            'crea_fecha',
            'modi_usuario_id',
            'modi_fecha',
            'notas_admin:ntext',
        ],
    ]) ?>

</div>
