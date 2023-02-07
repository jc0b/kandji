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
            $table->string('passport_enabled')->nullable();
            $table->string('passport_users')->nullable();

            $table->index('passport_enabled');
        });
    }
    
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->table($this->tableName) {
            $table->dropColumn('passport_enabled');
            $table->dropColumn('passport_users');
        }
    }
}
