<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masters extends Model
{
  protected $connection = 'mysql'; // def value: mysql
  protected $primaryKey = 'id';
  protected $table = 'specialist';
  protected $fillable = [
  'firstname',
  'lastname',
  'created_at',
];
}
