<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Forge;
use CodeIgniter\Database\Migration;

class UpgradeUserTableMigration extends Migration
{
    /**
     * @var string[]
     */
    private array $tables;

    public function __construct(?Forge $forge = null)
    {
        parent::__construct($forge);

        /** @var \Config\Auth $authConfig */
        $authConfig   = config('Auth');
        $this->tables = $authConfig->tables;
    }

    public function up()
    {
        $fields = [
            'first_name' => ['type'=>'VARCHAR', 'constraint'=>'30','null'=>false],
            'last_name' => ['type'=>'VARCHAR', 'constraint'=>'30','null'=>false],
            'address' => ['type'=>'TEXT','null' => true],
            'img' => ['type'=>'TEXT','null' => true],
            'mobile' => ['type' => 'VARCHAR', 'constraint' => '10', 'null' => true],
        ];
        $this->forge->addColumn($this->tables['users'], $fields);
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}