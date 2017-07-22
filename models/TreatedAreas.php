<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "treated_areas".
 *
 * @property integer $id
 * @property integer $tractor_id
 * @property integer $parcel_id
 * @property integer $area
 * @property string $date
 * @property string $updated_at
 * @property string $created_at
 *
 * @property Parcels $parcel
 * @property Tractors $tractor
 */
class TreatedAreas extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'treated_areas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tractor_id', 'parcel_id', 'area', 'date'], 'required'],
            [['tractor_id', 'parcel_id'], 'integer'],
            [['area'], 'number', 'min' => 0],
            [['date', 'updated_at', 'created_at'], 'safe'],
            [['date'], 'date', 'format' => 'yyyy-mm-dd'],
            [['parcel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Parcels::className(), 'targetAttribute' => ['parcel_id' => 'id']],
            [['tractor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tractors::className(), 'targetAttribute' => ['tractor_id' => 'id']],
            [['area'], 'checkMaxTreatedArea'],
        ];
    }

    public function checkMaxTreatedArea($attribute, $params)
    {
        if ($this->area > $this->parcel->area) {
            $this->addError($attribute, "Treated area must be smaller than the parcel area: {$this->parcel->area}.");
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tractor_id' => 'Tractor ID',
            'parcel_id' => 'Parcel ID',
            'area' => 'Treated Area',
            'date' => 'Date',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParcel()
    {
        return $this->hasOne(Parcels::className(), ['id' => 'parcel_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTractor()
    {
        return $this->hasOne(Tractors::className(), ['id' => 'tractor_id']);
    }

    public static function getTotal($items, $property)
    {
        $total = 0;
        foreach ($items as $item) {
            $total += $item->{$property};
        }

        return $total;
    }
}
