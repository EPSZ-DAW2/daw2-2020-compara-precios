<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regiones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Crear Región', ['create'], ['class' => 'btn btn-success']) ?>

    <?php

        $view_use = '{update}{view}{delete}';
        /*if(!Yii::$app->user->can('update')){ 
            $view_use = '{view}';
        } else{
            $view_use = '{update}{view}{delete}';
           }
        */?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'clase_region',
                'label' => 'Clase de región',
                'value' => function ($model) {
                    switch ($model->clase_region) {
                        case 'C':
                            return 'Continente';
                        case 'P':
                            return 'Pais';
                        case 'E':
                            return 'Estado';
                    }
                },
            ],
            'nombre',
            'region_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
