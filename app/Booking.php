<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  protected $connection = 'mysql'; // def value: mysql
  protected $primaryKey = 'id';
  protected $table = 'bookings';
  protected $fillable = [
  'specialist',
  'procedure',
  'time',
  'user_id',
  'created_at',
];
}
