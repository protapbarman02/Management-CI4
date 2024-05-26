<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductTableMigration extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'=>'INT',
                'unsigned'=>true,
                'auto_increment'=>true
            ],
            'name'=>[
                'type'=>'VARCHAR',
                'constraint'=>80,
                'null'=>false
            ],
            'category_id'=>[
                'type'=>'INT',
                'null'=>false,
                'unsigned'=>true
            ],
            'img'=>[
                'type'=>'VARCHAR',
                'constraint'=>255,
                'null'=>true
            ],
            'description'=>[
                'type'=>'TEXT',
                'null'=>false
            ],
            'active'=>[
                'type'=>'TINYINT',
                'constraint'=>1,
                'null'=>false,
                'default'=>1
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products');
    }

    public function down()
    {
        $this->forge->deleteTable('products');
    }
}
