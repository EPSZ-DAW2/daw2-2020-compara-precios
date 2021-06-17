<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "historico_precios".
 *
 * @property int $id
 * @property int $articulo_id Artículo relacionado.
 * @property int $tienda_id Tienda relacionada.
 * @property string|null $fecha Fecha y Hora de captura del precio del artículo en la tienda.
 * @property float $precio Precio capturado en la fecha/hora indicada.
 */
class HistoricoPrecios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'historico_precios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['articulo_id', 'tienda_id'], 'required'],
            [['articulo_id', 'tienda_id'], 'integer'],
            [['fecha'], 'safe'],
            [['precio'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'articulo_id' => 'Articulo',
            'tienda_id' => 'Tienda',
            'fecha' => 'Fecha',
            'precio' => 'Precio',
        ];
    }

    public function getTiendas()
    {
        return $this->hasOne(Tiendas::className(), ['id' => 'tienda_id']);
    }

    public function getArticulos()
    {
        return $this->hasOne(Articulos::className(), ['id' => 'articulo_id']);
    }
}
