<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
  protected $connection = 'mysql'; // def value: mysql
  protected $primaryKey = 'id';
  protected $table = 'users';
  protected $fillable = [
  'firstname',
  'lastname',
  'email',
];
}
