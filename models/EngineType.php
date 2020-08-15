<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "engine_type".
 *
 * @property int $id
 * @property string $engine
 *
 * @property Car[] $cars
 */
class EngineType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'engine_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['engine'], 'required'],
            [['engine'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'engine' => 'Engine',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::className(), ['engine_type_id' => 'id']);
    }
}
