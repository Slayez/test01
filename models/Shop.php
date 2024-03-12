<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property int $id
 * @property string $product_name
 * @property string $desc
 * @property int $size
 * @property string $color
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'size'], 'integer'],
            [['product_name', 'desc', 'size'], 'required'],
            [['product_name'], 'string', 'max' => 255],
            [['desc'], 'string', 'max' => 2500],
            [['color'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'desc' => 'Desc',
            'size' => 'Size',
            'color' => 'Color',
        ];
    }
}
