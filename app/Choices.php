<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choices extends Model
{
  protected $connection = 'mysql'; // def value: mysql
  protected $primaryKey = 'id';
  protected $table = 'Choices';
  protected $fillable = [
  'service',
  'price',
  'created_at',
];
}
