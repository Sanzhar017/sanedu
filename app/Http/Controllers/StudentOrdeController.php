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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $orders = StudentOrder::with('student', 'orderType', 'currentStatus')->orderBy('created_at','desc')->paginate(10);

      return view('orders.index', ['orders' => $orders]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::get();
        $orderTypes = OrderType::get();
        $statuses = Status::get();

        return view('orders.create',  ['students' => $students, 'orderTypes' => $orderTypes, 'statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Show the form for editing the specified resource.
     */
  public function edit($id)
  {
    $order = StudentOrder::findOrFail($id);
    $students = Student::all();
    $orderTypes = OrderType::all();
    $statuses = Status::all();

    return view('orders.edit', compact('order', 'students', 'orderTypes', 'statuses'));
  }


  /**
     * Update the specified resource in storage.
     */
  public function update(StudentOrderUpdateRequest $request)
  {
    $validatedData = $request->validated();



    return redirect()->route('orders.index')->with('success', 'Order updated successfully');
  }


  /**
     * Remove the specified resource from storage.
     */
  public function destroy(StudentOrder $order)
  {
    $order->delete();

    return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
  }

}
