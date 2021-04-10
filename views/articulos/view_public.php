<?php

use app\models\Articulos;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Articulos */

$this->title = 'Ficha del artículo ['.$model->nombre.']';
$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="articulos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre:ntext',
            'descripcion:ntext',
            [
                'label' => 'categorias',
                'value' => function ($model) {
                    return $model->get_nombre_categoria();
                }
              ],
              [

                'attribute'=>'photo','label'=>'Imagen del articulo',

                'value'=>'../../web/iconos/articulos/'.$model->imagen_id,

                'format' => ['image',['width'=>'50','height'=>'50']],

            ],
            [
                'label'=>'visibilidad',
                'value' => function ($model) {
                    $estados =  Articulos::get_visibilidad();
                    return $estados[$model->visible];
                }
              ],
            [
                'label'=>'Estado del artículo',
                'value' => function ($model) {
                    $estados =  Articulos::get_estados();
                    return $estados[$model->cerrado];
                }
              ],
              [
                'label'=>'Artículo común o particular',
                'value' => function ($model) {
                    $estados =  Articulos::get_comun();
                    return $estados[$model->comun];
                }
              ],
            'crea_usuario_id',
            'crea_fecha',
            'modi_usuario_id',
            'modi_fecha',
            'notas_admin:ntext',
        ],
    ]) ?>

</div>
