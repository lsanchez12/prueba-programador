<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ciudad".
 *
 * @property integer $id
 * @property integer $id_pais
 * @property string $ciudad
 */
class Ciudad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ciudad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pais', 'ciudad'], 'required'],
            [['id_pais'], 'integer'],
            [['ciudad'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pais' => 'Id Pais',
            'ciudad' => 'Ciudad',
        ];
    }
}
