<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 's_status_id'];

  public function orderType()
  {
    return $this->belongsTo(OrderType::class, 'status_id');
  }

  public function studentOrders()
  {
    return $this->hasMany(StudentOrder::class, 'student_id');
  }

}
