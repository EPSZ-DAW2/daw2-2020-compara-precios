<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HistoricoPrecios */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Historico Precios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="historico-precios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que desea eliminar este histórico de precio?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'articulos.nombre',
                'label' => 'Artículo',
                'filterInputOptions' => ['prompt' => 'Todos', 'class' => 'form-control']
            ],
            [
                'attribute' => 'tiendas.nombre_tienda',
                'label' => 'Tienda',
                'filterInputOptions' => ['prompt' => 'Todos', 'class' => 'form-control']
            ],
            'fecha:date',
            'precio:currency',
        ],
    ]) ?>

</div>
