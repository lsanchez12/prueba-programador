<?php

namespace app\controllers;

use Yii;
use app\models\Viajes;
use app\models\ViajesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Viajeros;
use app\models\ViajerosSearch;
use app\models\Boletos;
use app\models\Paises;
use yii\helpers\ArrayHelper;
/**
 * ViajesController implements the CRUD actions for Viajes model.
 */
class ViajesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Viajes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ViajesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Viajes model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Viajes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Viajes();
        $paises=Paises::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->codigo_viaje]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'listData'=>$listData,
            ]);
        }
    }
    /**
     * Reserva de Boletos por los Usuarios
     * 
     */
    public function actionReserva($id){
        $viaje=$this->findModel($id);
        $searchModel = new ViajerosSearch();
        $viajero = new Viajeros();
        $model = new Boletos();
        if ($viajero->load(Yii::$app->request->post())) {
            if($model2=$this->findViajero($viajero->cedula)){
                $model->id_viajero=$viajero->id;
                $model->id_viaje=$viaje->codigo_viaje;
                return $this->redirect(['/boletos/create',
                    'viajero'=>$model2->id,
                    'viaje'=>$viaje->codigo_viaje,
                    'model'=>$model,
                ]);
            }
            elseif($viajero->save()){
                $model->id_viajero=$viajero->id;
                $model->id_viaje=$viaje->codigo_viaje;
                return $this->redirect(['/boletos/create',
                    'viajero'=>$viajero->id,
                    'viaje'=>$viaje->codigo_viaje,
                    'model'=>$model,
                ]);
            }

        }
            return $this->render('reserva',[
                'model' => $model,
                'viajero' => $viajero,
                'searchModel' =>$searchModel,
            ]);
    }
    /**
     * Updates an existing Viajes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->codigo_viaje]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Viajes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findViajero($cedula)
    {
        if (($model = Viajeros::find()->where(['cedula'=>$cedula])->one())) {
            return $model;
        } else {
            return false;
        }
    }
    /**
     * Finds the Viajes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Viajes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Viajes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
