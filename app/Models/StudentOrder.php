<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentOrder extends Model
{
  use HasFactory;

  protected $fillable = [
    'student_id',
    'order_type_id',
    'order_number',
    'order_date',
    'title',
    'old_status_id',
    's_status_id',
  ];


  public function student()
  {
    return $this->belongsTo(Student::class, 'student_id');
  }

  public function orderType()
  {
    return $this->belongsTo(OrderType::class, 'order_type_id');
  }

  public function status()
  {
    return $this->belongsTo(Status::class, 's_status_id');
  }
