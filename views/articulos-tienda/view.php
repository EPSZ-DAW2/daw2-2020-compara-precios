<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Articulostienda */

$this->title = $model->nomArticulo . " en " . $model->nomTienda;
$this->params['breadcrumbs'][] = ['label' => 'Articulostiendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="articulostienda-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?php
        if($model->bloqueado===0){

            echo Html::a('Bloquear', ['bloqueo', 'id' => $model->id], ['class' => 'btn btn-warning']); 
        }

        if($model->bloqueado!==0){

            echo Html::a('Quitar bloqueo', ['quitabloqueo', 'id' => $model->id], ['class' => 'btn btn-warning']); 
        }

        ?>

        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [

        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Crear oferta', ['oferta', 'articulo_id' => $model->articulo_id, 'tienda_id' => $model->tienda_id, 'precio_original' => $model->precio, 'crea_usuario_id'=>$model->crea_usuario_id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [

            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <?php /*Boton para probar la denuncia publica echo Html::a('Denuncia?', ['denuncia', 'id' => $model->id], ['class' => 'btn btn-primary'])*/ ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'articulo_id',
            'nomArticulo',
            'tienda_id',
            'nomTienda',
            'imagen_id',
			[
				'attribute' => 'imagen_id',
				'format' => 'html',
				'label' => 'Imagen',
				'value' => function ($model) {
					return Html::img('@web/uploads/'.$model->imagen_id,['width' => '300px']);
				},
			],
            'url_articulo:url',
            //'precio',
			[
				'attribute' => 'precio',
				//'format' => 'Currency',
				'value' => function ($model) {
					return Yii::$app->formatter->asCurrency($model->precio);
				},
			],
            'sumaValores',
            'totalVotos',
            'artVisible',
            'artCerrado',
            'num_denuncias',
            'fecha_denuncia1',
            'notas_denuncia:ntext',
            'artBloqueado',
            'fecha_bloqueo',
            'notas_bloqueo:ntext',
            'artCerradoCom',
            'crea_usuario_id',
            'crea_fecha',
            'modi_usuario_id',
            'modi_fecha',
            'notas_admin:ntext',
        ],
    ]) ?>

</div>
