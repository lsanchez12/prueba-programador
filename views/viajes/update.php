<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Viajes */

$this->title = 'Update Viajes: ' . $model->codigo_viaje;
$this->params['breadcrumbs'][] = ['label' => 'Viajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->codigo_viaje, 'url' => ['view', 'id' => $model->codigo_viaje]];
$this->params['breadcrumbs'][] = 'Update';
$isAdmin= !(Yii::$app->user->isGuest);
?>
<div class="viajes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
