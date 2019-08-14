<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Genre extends Model
{
  // Table name
  protected $table = 'genres';
  // Primary Key
  public $primaryKey = 'id';

  public function closed_at()
  {
    $date = new Carbon($this->closed_at);
    return $date->format('d/m/y');
  }

}
