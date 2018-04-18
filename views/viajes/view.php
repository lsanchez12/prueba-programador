<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Viajes */

$this->title = $model->codigo_viaje;
$this->params['breadcrumbs'][] = ['label' => 'Viajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$isAdmin= !(Yii::$app->user->isGuest);
?>
<div class="viajes-view">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row"> 
                <div class="col-md-8">
                    <h3>Viaje #<?= Html::encode($this->title) ?></h3>
                </div>    
                <div class="col-md-4">
                    <?php if(!$isAdmin):?>
                        <?= Html::a("Reservar Boleto", ['reserva','id'=> $model->codigo_viaje],['class' => 'btn btn-primary pull-right'])?>
                    <?php endif;?>
                </div>  
            </div>      
        </div>
        <div class="panel-body">
            <?php if($isAdmin):?>
                <p>
                    <?= Html::a('Update', ['update', 'id' => $model->codigo_viaje], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->codigo_viaje], [
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
                        'codigo_viaje',
                        'plazas',
                         [
                            'label' => 'Origen',
                            'attribute' => 'Origen',
                        ],
                        [
                            'label' => 'Destino',
                            'attribute' => 'Destino',
                        ],
                        [ 
                            'label' => 'Precio',
                            'value' => $model->precio." $",
                        ],
                    ],
                ]) ?>
        </div>
    </div>  
</div>
