<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Attribute extends Model
{
  protected $guarded = ['id'];

  public function attribute_values() {
    return $this->hasMany(AttributeValue::class);
  }

}
