<?php

use munkireport\models\MRModel as Eloquent;

class Kandji_model extends Eloquent
{
    protected $table = 'kandji';

    protected $hidden = ['id', 'serial_number'];

    protected $fillable = [
      'serial_number',
      'device_id',
      'name',
      'kandji_agent_version',
      'asset_tag',
      'last_check_in',
      'last_enrollment',
      'first_enrollment',
      'blueprint_id',
      'blueprint_name',
      'realname',
      'email_address',
      'passport_enabled',
      'passport_users',
    ];
}
