<?php

namespace App\Http\Controllers;

use App\Models\StudentOrder;
use App\Models\Student;
use App\Models\OrderType;
use App\Models\Status;
use Illuminate\Http\Request;

class StudentOrderController extends Controller
{
  public function index()
  {
    $orders = StudentOrder::with(['student', 'orderType', 'oldStatus', 'currentStatus'])->get();
    return view('orders.index', compact('orders'));
  }

  public function create(Student $student)
  {
    $orderTypes = OrderType::all();
    $statuses = Status::all();
    return view('orders.create', compact('student', 'orderTypes', 'statuses'));
  }


  public function store(Request $request, Student $student)
  {
    $request->validate([
      'order_type_id' => 'required',
      'order_number' => 'required',
      'order_date' => 'required',
      'title' => 'required',
      'old_status_id' => 'required',
      's_status_id' => 'required',
    ]);

    $studentOrder = $student->student_orders()->create($request->all());

    return redirect()->route('students.show', ['student' => $student])->with('success', 'Order attached successfully');
  }

  public function show(StudentOrder $order)
  {
    return view('student_orders.show', compact('order'));
  }

  public function edit(StudentOrder $order)
  {
    $orderTypes = OrderType::all();
    $statuses = Status::all();
    return view('orders.edit', compact('order', 'orderTypes', 'statuses'));
  }

  public function update(Request $request, StudentOrder $order)
  {
    $request->validate([
      // Ваши правила валидации
    ]);

    $order->update($request->all());

    return redirect()->route('student.show', ['student' => $order->student])->with('success', 'Order updated successfully');
  }

  public function destroy(StudentOrder $order)
  {
    $order->delete();

    return redirect()->route('student.show', ['student' => $order->student])->with('success', 'Order deleted successfully');
  }
}
