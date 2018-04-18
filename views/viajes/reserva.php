<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ViajesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reserva Boletos';
$this->params['breadcrumbs'][] = $this->title;
$isAdmin= !(Yii::$app->user->isGuest);
?>

<div class="viajes-reserva">
    <div class="row">   
         <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Usuario</h3>
                </div>
                <div class="panel-body">
                    <?= $this->render('/viajeros/create', [
                         'model' => $viajero,
                        ]) ?>
                </div>    
            </div>
        </div>
    </div>
</div>