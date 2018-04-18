<?php

namespace app\controllers;

use Yii;
use app\models\Boletos;
use app\models\BoletosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Viajes;

/**
 * BoletosController implements the CRUD actions for Boletos model.
 */
class BoletosController extends Controller
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
     * Lists all Boletos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BoletosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Boletos model.
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
     * Creates a new Boletos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($viajero,$viaje)
    {
        $model = new Boletos();
        $model->id_viajero=$viajero;
        $model->id_viaje=$viaje;
        $plazas=$this->plazasDisponibles($viaje);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $viaje=$this->findViaje($viaje);
            $viaje->plazas=$viaje->plazas-$model->cantidad_plazas;
            if($viaje->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'plazas' => $plazas,
            ]);
        }
        
    }

    /**
     * Updates an existing Boletos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function plazasDisponibles($viaje){
        $r = Viajes::find()->where(['codigo_viaje'=>$viaje])->one();
        return $r['plazas'];
    }
    /**
     * Deletes an existing Boletos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Boletos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Boletos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
     protected function findViaje($id)
    {
        if (($model = Viajes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModel($id)
    {
        if (($model = Boletos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
