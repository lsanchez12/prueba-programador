<?php

namespace app\models;
use app\models\Paises;
use Yii;

/**
 * This is the model class for table "viajes".
 *
 * @property integer $codigo_viaje
 * @property integer $plazas
 * @property integer $destino
 * @property integer $origen
 * @property double $precio
 */
class Viajes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'viajes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo_viaje', 'plazas', 'destino', 'origen', 'precio'], 'required'],
            [['plazas', 'destino', 'origen'], 'integer'],
            [['precio'], 'number'],
            [['codigo_viaje'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo_viaje' => 'Codigo Viaje',
            'plazas' => 'Plazas',
            'destino' => 'Destino',
            'origen' => 'Origen',
            'precio' => 'Precio',
        ];
    }
    function getOrigen(){
        $results= Paises::find()->where(['id'=>$this->origen])->all();
        return $results[0]['pais'];
    }
    function getDestino(){
        $results= Paises::find()->where(['id'=>$this->destino])->all();
        return $results[0]['pais'];
    }
    function getPrecio(){
        return $this->precio."$";
    }
}
