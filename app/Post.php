<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
  // Table name
  protected $table = 'posts';
  // Primary Key
  public $primaryKey = 'id';

  //Relaciones
  public function genre()
  {
      return $this->belongsTo(Genre::class, 'genre_id');
  }
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id');
  }
  //Time functions
  public function created_at()
  {
    $date = new Carbon($this->created_at);
    return $date->format('d-m-Y');
  }
  public function updated_at()
  {
    $date = new Carbon($this->updated_at);
    return $date->format('d-m-Y H:i');
  }
}
