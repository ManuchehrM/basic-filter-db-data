<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drive_type".
 *
 * @property int $id
 * @property string $drive
 *
 * @property Car[] $cars
 */
class DriveType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'drive_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['drive'], 'required'],
            [['drive'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'drive' => 'Drive',
        ];
    }

    /**
     * Gets query for [[Cars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Car::className(), ['drive_type_id' => 'id']);
    }
}
