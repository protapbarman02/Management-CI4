<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\I18n\Time;

class UpgradeProductTablev2Migration extends Migration
{
    public function up()
    {
        $this->forge->addColumn('products',[
            'created_at'=>[
                'type'=>'datetime',
                'null'=>false
            ],
            'updated_at'=>[
                'type'=>'datetime',
                'null'=>true,
            ],
            
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('products', ['created_at','updated_at']);
    }
}
