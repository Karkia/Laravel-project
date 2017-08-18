<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $connection = 'mysql'; // def value: mysql
    protected $primaryKey = 'id';
    protected $table = 'users';
    protected $fillable = [
    'firstname',
    'lastname',
    'email',
    'password',
    'admin',
  ];
 public function isAdmin()
  {
      return $this->admin; // this looks for an admin column in your users table
  }

}
