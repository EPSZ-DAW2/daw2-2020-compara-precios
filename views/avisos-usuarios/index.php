<?php

use app\models\AvisosUsuarios;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AvisosUsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Avisos Usuarios';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="avisos-usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <? //= Html::a('Create Avisos Usuarios', ['create'], ['class' => 'btn btn-success']) 
        ?>
    </p> -->

    <?php if (Yii::$app->user->can('update')) { ?>
        <?= Html::a('Crear Aviso', ['create'], ['class' => 'btn btn-success']) ?>

    <?php }
    $view_use = '';
    if (!Yii::$app->user->can('update')) {
        $view_use = '{view}';
    } else {
        $view_use = '{update}{view}{delete}';
    }
    ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fecha_aviso:datetime',
            [
                'attribute' => 'clase_aviso',
                'filter' => AvisosUsuarios::getClaseAviso(),
                'format' => 'raw',
                'value' => function ($model) {
                    switch ($model->clase_aviso) {
                        case 'A':
                            return 'Aviso';
                        case 'N':
                            return 'Notificación';
                        case 'D':
                            return 'Denuncia';
                        case 'C':
                            return 'Consulta';
                        case 'B':
                            return 'Bloqueo';
                        case 'M':
                            return 'Mesaje';
                    }
                },
                'filterInputOptions' => ['prompt' => 'Todos', 'class' => 'form-control']
            ],
            'texto:ntext',
            'origen_usuario_id',
            'destino_usuario_id',
            [
                'attribute' => 'tiendas.nombre_tienda',
                'label' => 'Nombre tienda',
                'filterInputOptions' => ['prompt' => 'Todos', 'class' => 'form-control']
            ],
            [
                'attribute' => 'articulos.nombre',
                'label' => 'Artículo',
                'filterInputOptions' => ['prompt' => 'Todos', 'class' => 'form-control']
            ],
            'comentario_id',
            [
                'attribute' => 'comentario_id',
                'label' => 'Comentario',
                'format' => 'raw',
                'value' => function (AvisosUsuarios $model) {
                    if ($model->comentario_id != null) {
                        return $model->comentario_id;
                    } else {
                        return 'Sin comentario';
                    }
                },
            ],
            [
                'attribute' => 'fecha_lectura',
                'label' => 'Leído',
                'format' => 'raw',
                'value' => function (AvisosUsuarios $model) {
                    if ($model->fecha_lectura != null) {
                        return $model->fecha_lectura;
                    } else {
                        return '<i class="bi bi-eye-slash-fill text-info" style="font-size: 2rem;"></i>';
                    }
                },
            ],
            [
                'attribute' => 'fecha_aceptado',
                'label' => 'Aceptado',
                'format' => 'raw',
                'value' => function (AvisosUsuarios $model) {
                    if ($model->fecha_lectura != null) {
                        return $model->fecha_lectura;
                    } else {
                        return '<i class="bi bi-x-square-fill text-danger" style="font-size: 2rem;"></i>';
                    }
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {leido} {aceptado}',
                'buttons' => [
                    'leido' => function ($url, $model, $key) {
                        return Html::a('<i class="bi bi-eye-fill" title="Marcar como leído"></i>', ['leido', 'id' => $model->id], [
                            'data' => [
                                'method' => 'post',
                            ],
                        ]);
                    },
                    'aceptado' => function ($url, $model, $key) {
                        return Html::a('<i class="bi bi-check-square-fill" title="Marcar como aceptado"></i>', ['aceptado', 'id' => $model->id], [
                            'data' => [
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ]
        ],
    ]); ?>


</div>