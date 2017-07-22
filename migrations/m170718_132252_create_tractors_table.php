<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tractors`.
 */
class m170718_132252_create_tractors_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('tractors', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'updated_at' => $this->timestamp()->defaultValue(null),
            'created_at' => $this->timestamp()->defaultValue(null),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('tractors');
    }
}
