<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class Kandji extends Migration
{
    private $tableName = 'kandji';
    private $tableNameV2 = 'kandji_orig';
    
    public function up()
    {
        $capsule = new Capsule();

        $migrateData = false;

        if ($capsule::schema()->hasTable($this->tableNameV2)) {
            // Migration already failed before, but didnt finish
            throw new Exception("previous failed migration exists");
        }

        if ($capsule::schema()->hasTable($this->tableName)) {
            $capsule::schema()->rename($this->tableName, $this->tableNameV2);
            $migrateData = true;
        }

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

        if ($migrateData) {
            $capsule::unprepared("INSERT INTO 
                $this->tableName
            SELECT
                id,
                serial_number,
                kandji_id,
                name,
                kandji_agent_version,
                asset_tag,
                last_check_in,
                last_enrollment,
                first_enrollment,
                blueprint_id,
                blueprint_name,
                realname,
                email_address,
                passport_enabled,
                passport_users
            FROM
                $this->tableNameV2");
            $capsule::schema()->drop($this->tableNameV2);
        }
        
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
        if ($capsule::schema()->hasTable($this->tableNameV2)) {
            $capsule::schema()->rename($this->tableNameV2, $this->tableName);
        }
    }
}
