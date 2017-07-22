<?php

use yii\db\Migration;

/**
 * Handles the creation of table `treated_areas`.
 */
class m170718_134726_create_treated_areas_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('treated_areas', [
            'id' => $this->primaryKey(),
            'tractor_id' => $this->integer(11)->notNull(),
            'parcel_id' => $this->integer(11)->notNull(),
            'area' => $this->float(3)->notNull(),
            'date' => $this->date()->notNull(),
            'updated_at' => $this->timestamp()->defaultValue(null),
            'created_at' => $this->timestamp()->defaultValue(null),
        ]);

        $this->addForeignKey(
            'fk_treated_areas_tractors_tractor_id',
            'treated_areas',
            'tractor_id',
            'tractors',
            'id',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk_treated_areas_parcels_parcel_id',
            'treated_areas',
            'parcel_id',
            'parcels',
            'id',
            'RESTRICT'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('treated_areas');
    }
}
