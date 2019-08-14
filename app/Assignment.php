<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Assignment extends Model
{
  // Table name
  protected $table = 'assignments';
  // Primary Key
  public $primaryKey = 'id';

  public function created_at()
  {
    $date = new Carbon($this->created_at);
    return $date->format('d/m/y');
  }

  public function closed_at()
  {
    $date = new Carbon($this->closed_at);
    return $date->format('d/m/y');
  }
  
}
