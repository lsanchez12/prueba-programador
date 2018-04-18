<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Boletos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Boletos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$isAdmin= !(Yii::$app->user->isGuest);
?>
<div class="boletos-view">

    <h1>Boleto #<?= Html::encode($this->title) ?></h1>
    <?php if($isAdmin):?>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php endif;?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label'=>'Número de Boleto',
                'attribute'=>'id',
            ],
            [
                'label'=>'Número de Viaje',
                'attribute'=>'Viaje',
            ],
            [
                'label' => 'Viajero',
                'attribute' => 'Viajero',
            ],
            'cantidad_plazas',
            [
                'label'=>'Total',
                'attribute'=>'Final',
            ],
        ],
    ]) ?>

</div>
