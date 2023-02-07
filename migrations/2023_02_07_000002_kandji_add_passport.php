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
        $capsule::schema()->create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number')->unique();
            $table->string('kandji_id');
            $table->string('name')->nullable();
            $table->string('kandji_agent_version')->nullable();
            $table->text('asset_tag')->nullable();
            $table->bigInteger('last_check_in')->nullable();
            $table->bigInteger('last_enrollment')->nullable();
            $table->bigInteger('first_enrollment')->nullable();
            $table->string('blueprint_id')->nullable();
            $table->text('blueprint_name')->nullable();
            $table->text('realname')->nullable();
            $table->string('email_address')->nullable();
            $table->string('passport_enabled')->nullable();
            $table->string('passport_users')->nullable();
        });
        
        // Make the indexes
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->index('id');
            $table->index('serial_number');
            $table->index('kandji_id');
            $table->index('name');
            $table->index('kandji_agent_version');
            $table->index('blueprint_id');
            $table->index('email_address');
            $table->index('passport_enabled');
        });
    }
    
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->dropIfExists($this->tableName);
    }
}
