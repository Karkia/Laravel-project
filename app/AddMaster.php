<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddMaster extends Model
{
  protected $connection = 'mysql'; // def value: mysql
  protected $primaryKey = 'id';
  protected $table = 'specialist';
  protected $fillable = [
  'firstname',
  'lastname',
  ];
}
