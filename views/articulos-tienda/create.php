<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Articulostienda */

$this->title = 'Create Articulostienda';
$this->params['breadcrumbs'][] = ['label' => 'Articulostiendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulostienda-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
