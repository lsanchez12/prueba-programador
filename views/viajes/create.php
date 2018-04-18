<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Viajes */

$this->title = 'Create Viajes';
$this->params['breadcrumbs'][] = ['label' => 'Viajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="viajes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
