<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RegionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Regiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regiones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Regiones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'clase_region',
            'nombre',
            'region_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
