<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TiendasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Elige una tienda sin propietario';
?>
<div class="tiendas-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'url_tienda:ntext',
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
            //'nombreCompleto',

            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{elegir_usuario}',
            'buttons'  => ['elegir_usuario' => function($url, $model) {
                            return Html::a('<span class="glyphicon glyphicon-arrow-right"></span>', $url, [ 'title' => Yii::t('app', 'Elegir_usuario'),]);

                            }

                        ],

            'urlCreator' => function ($action, $model, $key, $index) {

                if ($action === 'elegir_usuario') {

                    $url = 'index.php?r=usuarios/elegir_usuario&id_tienda='.$model['id'];

                    return $url;

                }
             }

        ]
        ],
    ]); ?>


</div>
