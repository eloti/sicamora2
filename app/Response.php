<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
  // Table name
  protected $table = 'reponses';
  // Primary Key
  public $primaryKey = 'id';

  //Relaciones
  public function post()
  {
      return $this->belongsTo(Post::class, 'post_id');
  }
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id');
  }
  public function comment()
  {
      return $this->belongsTo(Comment::class, 'comment_id');
  }
}
