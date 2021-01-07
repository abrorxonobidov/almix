<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'full_name' => $this->string(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createIndex('user_id_uindex', '{{%user}}', 'id', true);

        $this->insert('{{%user}}', [
            'username' => 'abrorxonobidov',
            'full_name' => 'Abrorxon Obidov',
            'auth_key' => 'oyXF-L0BTDbFHkDkCQ5EKSM5mwv5EPbb',
            'password_hash' => '$2y$13$i4SsfJqtpINqR08pZauVIONeMAczA9f2jJgQhZCrtEEojnKJq34H2',
            'email' => 'abrorkhon.obidov@gmail.com',
            'status' => 10
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
