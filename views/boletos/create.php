<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Boletos */

$this->title = 'Create Boletos';
$this->params['breadcrumbs'][] = ['label' => 'Boletos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="boletos-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if($plazas>0):?>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php else: ?>

    <h3>No hay plazas para este viaje</h3>
    <?php endif;?>    
</div>
