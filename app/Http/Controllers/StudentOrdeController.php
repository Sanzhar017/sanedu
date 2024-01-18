<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentOrderRequest;
use App\Http\Requests\StudentOrderUpdateRequest;
use App\Models\OrderType;
use App\Models\Status;
use App\Models\Student;
use App\Models\StudentOrder;
use Illuminate\Http\Request;

class StudentOrdeController extends Controller
{

    public function index()
    {
      $orders = StudentOrder::with('student', 'orderType', 'currentStatus')->orderBy('created_at','desc')->paginate(10);

      return view('orders.index', ['orders' => $orders]);

    }


    public function create()
    {
        $students = Student::get();
        $orderTypes = OrderType::get();
        $statuses = Status::get();

        return view('orders.create',  ['students' => $students, 'orderTypes' => $orderTypes, 'statuses' => $statuses]);
    }


  public function store(StudentOrderRequest $request)
  {
    $validatedData = $request->validated();

    $studentIds = $validatedData['student_id'];

    $dataToInsert = [];
    foreach ($studentIds as $studentId) {
      $dataToInsert[] = ['student_id' => $studentId] + $validatedData;
    }

    StudentOrder::insert($dataToInsert);

    return redirect()->route('orders.index')->with('success', 'Student for order created successfully');
  }


  public function show(StudentOrder $order)
    {
      return view('orders.show', ['order' => $order]);

    }


  public function edit($id)
  {
    $order = StudentOrder::findOrFail($id);
    $students = Student::get();
    $orderTypes = OrderType::get();
    $statuses = Status::get();

    return view('orders.edit', ['order' => $order, 'students' => $students, 'orderTypes' => $orderTypes, 'statuses' => $statuses]);
  }


  public function update(Request $request, StudentOrder $id)
  {
    $request->validate([
      'student_id' => 'required',
      'order_type_id' => 'required',
      'order_number' => 'required',
      'order_date' => 'required',
      'title' => 'required',
      'old_status_id' => 'required',
      's_status_id' => 'required',
    ]);

    $order = StudentOrder::findOrFail($id);
    $order->update($request->all());

    return redirect()->route('orders.index')->with('success', 'Order updated successfully');
  }


  public function destroy(StudentOrder $order)
  {
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
  }

}
