<?php

use yii\db\Migration;

/**
 * Handles the creation of table `parcels`.
 */
class m170718_114937_create_parcels_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('parcels', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'culture' => $this->string()->notNull(),
            'area' => $this->float(3)->notNull(),
            'updated_at' => $this->timestamp()->defaultValue(null),
            'created_at' => $this->timestamp()->defaultValue(null),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('parcels');
    }
}
