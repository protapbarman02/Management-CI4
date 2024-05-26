<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpgradeProductTableMigration extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products',[
            'created_at'=>[
                'type'=>'TIMESTAMP',
                'null'=>false,
                'default'=>'CURRENT_TIMESTAMP'
            ],
            'updated_at'=>[
                'type'=>'TIMESTAMP',
                'null'=>true,
            ],
            
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('products', ['created_at','updated_at']);
    }
}
