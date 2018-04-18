<?php

namespace app\models;
use app\models\Viajes;
use app\models\Viajeros;
use Yii;

/**
 * This is the model class for table "boletos".
 *
 * @property integer $id
 * @property integer $id_viajero
 * @property integer $id_viaje
 * @property integer $cantidad_plazas
 */
class Boletos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boletos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_viajero', 'id_viaje', 'cantidad_plazas'], 'required'],
            [['id_viajero', 'id_viaje', 'cantidad_plazas'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_viajero' => 'Id Viajero',
            'id_viaje' => 'Id Viaje',
            'cantidad_plazas' => 'Cantidad Plazas',
        ];
    }
    function getViajero(){
        $results= Viajeros::find()->where(['id'=>$this->id_viajero])->all();
        return $results[0]['nombre'];
    }
    function getViaje(){
        $results= Viajes::find()->where(['codigo_viaje'=>$this->id_viaje])->all();
        return "#".$results[0]['codigo_viaje'];
    }
    function getFinal(){
       $results= Viajes::find()->where(['codigo_viaje'=>$this->id_viaje])->all();
        return (($this->cantidad_plazas*$results[0]['precio']).'$');
    }
}
