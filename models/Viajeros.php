<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "viajeros".
 *
 * @property integer $id
 * @property string $cedula
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 */
class Viajeros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'viajeros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'nombre', 'direccion', 'telefono'], 'required'],
            [['cedula'], 'string', 'max' => 12],
            [['nombre'], 'string', 'max' => 120],
            [['direccion'], 'string', 'max' => 200],
            [['telefono'], 'string', 'max' => 20],
            [['cedula'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cedula' => 'Cedula',
            'nombre' => 'Nombre',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
        ];
    }
}
