<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paises".
 *
 * @property integer $id
 * @property string $iso
 * @property string $pais
 */
class Paises extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paises';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iso', 'pais'], 'required'],
            [['iso'], 'string', 'max' => 5],
            [['pais'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'iso' => 'Iso',
            'pais' => 'Pais',
        ];
    }
}
