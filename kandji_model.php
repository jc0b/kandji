<?php

use munkireport\models\MRModel as Eloquent;

class Kandji_new_model extends Eloquent
{
    protected $table = 'kandji_new';

    protected $hidden = ['id', 'serial_number'];

    protected $fillable = [
      'serial_number',
      'kandji_id',
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
    ];
}
