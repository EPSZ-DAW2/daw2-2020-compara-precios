<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Histórico de precios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historico-precios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        $view_use = '';
        if(!Yii::$app->user->can('update')){ 
            $view_use = '{view}';
        } else{
            $view_use = '{update}{view}{delete}';
           }
        ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
