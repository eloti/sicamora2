<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Read extends Model
{
  // Table name
  protected $table = 'reads';
  // Primary Key
  public $primaryKey = 'id';
}
