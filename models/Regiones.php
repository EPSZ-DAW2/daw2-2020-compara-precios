<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "regiones".
 *
 * @property int $id
 * @property string $clase_region Código de clase de la región (fijado desde programación): C=Continente, P=Pais, E=Estado, P=Provincia, ...
 * @property string $nombre Nombre de la zona que la identifica.
 * @property int|null $region_id Región relacionada. Nodo padre de la jerarquia o CERO si es nodo raiz.
 */
class Regiones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regiones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clase_region', 'nombre'], 'required'],
            [['region_id'], 'integer'],
            [['clase_region'], 'string', 'max' => 1],
            [['nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clase_region' => 'Clase de región',
            'nombre' => 'Nombre',
            'region_id' => 'Región relacionada',
        ];
    }
}
