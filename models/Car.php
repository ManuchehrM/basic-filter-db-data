<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "car".
 *
 * @property int $id
 * @property int|null $brand_id
 * @property int $model_id
 * @property int|null $engine_type_id
 * @property int|null $drive_type_id
 * @property int|null $status
 *
 * @property DriveType $driveType
 * @property EngineType $engineType
 * @property Model $model
 * @property Brand $brand
 */
class Car extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'model_id', 'engine_type_id', 'drive_type_id', 'status'], 'integer'],
            [['model_id'], 'required'],
            [['drive_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => DriveType::className(), 'targetAttribute' => ['drive_type_id' => 'id']],
            [['engine_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EngineType::className(), 'targetAttribute' => ['engine_type_id' => 'id']],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => Model::className(), 'targetAttribute' => ['model_id' => 'id']],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brand_id' => 'Brand ID',
            'model_id' => 'Model ID',
            'engine_type_id' => 'Engine Type ID',
            'drive_type_id' => 'Drive Type ID',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[DriveType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDriveType()
    {
        return $this->hasOne(DriveType::className(), ['id' => 'drive_type_id']);
    }

    /**
     * Gets query for [[EngineType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEngineType()
    {
        return $this->hasOne(EngineType::className(), ['id' => 'engine_type_id']);
    }

    /**
     * Gets query for [[Model]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::className(), ['id' => 'model_id']);
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    public static function getTitle($reguest){

        if(!empty($reguest->get('brand')) || !empty($reguest->get('model'))){
            return 'Продажа новых автомобилей '.$reguest->get('brand').' '.$reguest->get('model').'  в Санкт-Петербурге';
        }else{
            return 'Task';
        }
    }
}
