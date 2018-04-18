<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Paises;

/* @var $this yii\web\View */
/* @var $model app\models\Viajes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="viajes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_viaje')->textInput() ?>

    <?= $form->field($model, 'plazas')->textInput() ?>

    <?= $form->field($model, 'origen')->dropDownList(ArrayHelper::map(Paises::find()->all(),'id','pais'),['prompt' => 'Seleccione Uno' ]); ?>

    <?= $form->field($model, 'destino')->dropDownList(ArrayHelper::map(Paises::find()->all(),'id','pais'),['prompt' => 'Seleccione Uno' ]); ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
