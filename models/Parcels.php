<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parcels".
 *
 * @property integer $id
 * @property string $name
 * @property string $culture
 * @property integer $area
 * @property string $updated_at
 * @property string $created_at
 */
class Parcels extends \yii\db\ActiveRecord
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
        return 'parcels';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'culture', 'area'], 'required'],
            [['area'], 'number', 'min' => 0],
            [['updated_at', 'created_at'], 'safe'],
            [['name', 'culture'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'culture' => 'Culture',
            'area' => 'Area',
            'updated_at' => 'Updated At',
            'created_at' => 'Created At',
        ];
    }
}
