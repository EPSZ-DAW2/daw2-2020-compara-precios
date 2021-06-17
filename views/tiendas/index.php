<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TiendasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tiendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiendas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear una tienda', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Ver propietarios', ['propietarios'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Crear Región', ['regiones/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre_tienda:ntext',
            'descripcion_tienda:ntext',
            'lugar_tienda:ntext',
            'url_tienda:url',
            //'direccion_tienda:ntext',
            //'region_id_tienda',
            //'telefono_tienda',
            //'clasificacion_id',
            //'imagen_id',
            //'sumaValores',
            //'totalVotos',
            //'visible',
            //'cerrada',
            //'num_denuncias',
            //'fecha_denuncia1',
            //'notas_denuncia:ntext',
            //'bloqueada',
            //'fecha_bloqueo',
            //'notas_bloqueo:ntext',
            //'cerrado_comentar',
            //'usuario_id',
            //'nif_cif',
            //'nombre',
            //'apellidos',
            //'razon_social',
            //'direccion:ntext',
            //'region_id',
            //'telefono_contacto',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            //'notas_admin:ntext',
            'nombreCompleto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
