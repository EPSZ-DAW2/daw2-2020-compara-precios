<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $searchModel app\models\articulostiendaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articulostiendas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulostienda-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Elegir tienda y articulo a crear', ['tiendas/elegir_tienda','modo'=>2], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'articulo_id',
            'nomArticulo',
            //'tienda_id',
            'nomTienda',
            //'imagen_id',
            'url_articulo:url',
            //'precio',
            ['attribute'=>'precio'
                , 'filter'=>
                            Html::activeTextInput($searchModel, 'precioDesde', ['class'=>'form-control', 'size'=>4])
                            .Html::activeTextInput($searchModel, 'precioHasta', ['class'=>'form-control', 'size'=>4])
                ,'value' => function ($model) {
                    return Yii::$app->formatter->asCurrency($model->precio);
                },
            ],
			/*[
				'attribute' => 'precio',
				//'format' => 'Currency',
				'value' => function ($model) {
					return Yii::$app->formatter->asCurrency($model->precio);
				},
			],*/
            //'sumaValores',
            //'totalVotos',
            //'visible',
            [
                'attribute'=>'visible',
                'value'=>'artVisible',
                'filter'=>['0'=>'Invisible', '1'=>'Visible'],

            ],
            //'artVisible',
            //'cerrado',
            'num_denuncias',
            //'fecha_denuncia1',
            //'notas_denuncia:ntext',
            //'bloqueado',
            [
                'attribute'=>'bloqueado',
                'value'=>'artBloqueado',
                'filter'=>['0'=>'No', '1'=>'Bloqueado por denuncias', '2'=>'Bloqueado por Administrador'],

            ],
            //'artBloqueado',
            //'fecha_bloqueo',
            //'notas_bloqueo:ntext',
            //'cerrado_comentar',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            //'notas_admin:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
