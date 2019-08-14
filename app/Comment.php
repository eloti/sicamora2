<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  // Table name
  protected $table = 'comments';
  // Primary Key
  public $primaryKey = 'id';

  //Relaciones
  public function post()
  {
      return $this->belongsTo(Post::class, 'id');
  }
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id');
  }
}
