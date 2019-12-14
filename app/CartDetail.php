<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
  // Table Name
  protected $table = 'cart_details';

  // Primary Key
  public $primaryKey = 'id';

  // Timestamp
  public $timestamps = true;

  // Relationship
  public function flower() {
    return $this->belongsTo('App\Flower', 'flower_id', 'id');
  }
}
