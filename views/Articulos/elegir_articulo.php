<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticulosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Elige un articulo de los existentes';
?>
<div class="articulos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre:ntext',
            'descripcion:ntext',
            'categoria_id',
            'imagen_id',
            //'visible',
            //'cerrado',
            //'comun',
            //'crea_usuario_id',
            //'crea_fecha',
            //'modi_usuario_id',
            //'modi_fecha',
            //'notas_admin:ntext',

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{crear_propietario}',
            'buttons'  => ['crear_propietario' => function($url, $model) {
                            //var_dump($id_tienda);
                            return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url.'&id_tienda='.Yii::$app->request->get('id_tienda'), [ 'title' => Yii::t('app', 'Create'),]);

                            }

                        ],

            

            'urlCreator' => function ($action, $model, $key, $index) {

                if ($action === 'crear_propietario') {

                    $url = 'index.php?r=articulostienda/create&id_articulo='.$model['id'];

                    return $url;

                }
             }

        ]
        ],
    ]); ?>


</div>
