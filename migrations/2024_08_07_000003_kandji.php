<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class Kandji extends Migration
{
    private $tableName = 'kandji';
    
    public function up()
    {
        $capsule = new Capsule();
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->string('device_id');
            $table->index('device_id');
        });

        if ($capsule::schema()->hasColumn($this->tableName, 'kandji_id')) {
            $capsule::schema()->table($this->tableName, function (Blueprint $table) {
                $table->dropColumn('kandji_id');
            });
        }
    }
    
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->dropColumn('device_id');
        });

        if (!$capsule::schema()->hasColumn($this->tableName, 'kandji_id')) {
            $capsule::schema()->table($this->tableName, function (Blueprint $table) {
                $table->string('kandji_id');
                $table->index('kandji_id');
            });
        }
    }
}
