<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ViajesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Viajes';
$this->params['breadcrumbs'][] = $this->title;
$isAdmin= !(Yii::$app->user->isGuest);
?>
<div class="viajes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if($isAdmin): ?>
            <p>
                <?= Html::a('Crear Viaje', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        <?php Pjax::begin(); ?>    
        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

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
                        'attribute' => 'Precio',
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    <?php else: ?>
    <?php Pjax::begin(); ?>    
        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'codigo_viaje',
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
                        'attribute' => 'Precio',
                    ],

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                return false;
                            },
                            'delete' => function ($url,$model){
                                return false;
                            }
                        ],
                    ],
                ],
            ]); ?>
        <?php Pjax::end(); ?>

    <?php endif; ?>
</div>    
