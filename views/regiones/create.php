<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Regiones */

$this->title = 'Create Regiones';
$this->params['breadcrumbs'][] = ['label' => 'Regiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regiones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
