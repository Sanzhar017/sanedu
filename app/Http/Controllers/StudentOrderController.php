<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentOrderRequest;
use App\Models\StudentOrder;
use App\Models\Student;
use App\Models\OrderType;
use App\Models\Status;
use Illuminate\Http\Request;

class StudentOrderController extends Controller
{
  public function index()
  {
    $orders = StudentOrder::with(['student', 'ordertype_id', 'oldstatus_id', 's_status_id'])->get();
    return view('orders.index', ['orders' => $orders]);
  }

  public function create(Student $student)
  {
    $orderTypes = OrderType::all();
    $statuses = Status::all();
    $students = Student::all();

    return view('orders.create', compact('student', 'students', 'orderTypes', 'statuses'));
  }


  public function store(Request $request, Student $student)
  {
    $validatedData = $request->validate([
      'order_type_id' => 'required',
      'order_number' => 'required',
      'order_date' => 'required',
      'title' => 'required',
      'old_status_id' => 'required',
      's_status_id' => 'required',
    ]);

    $studentOrder = $student->studentOrders()->create($validatedData);

    return redirect()->route('students.show', ['student' => $student])->with('success', 'Order attached successfully');
  }

  public function show(StudentOrder $order)
  {
    return view('orders.show', ['order'=> $order]);
  }

  public function edit(StudentOrder $order)
  {
    $orderTypes = OrderType::get();
    $statuses = Status::get();
    return view('orders.edit', ['order'=>$order, 'orderTypes'=>$orderTypes, 'statuses'=>$statuses]);
  }

  public function update(Request $request, StudentOrder $order)
  {
    $request->validate([

    ]);

    $order->update($request->all());

    return redirect()->route('student.show', ['student' => $order->student])->with('success', 'Order updated successfully');
  }

  public function destroy(StudentOrder $order)
  {
    $order->delete();

    return redirect()->route('orders.index', ['student' => $order->student])->with('success', 'Order deleted successfully');
  }
}
