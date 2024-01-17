<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentOrderRequest;
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

      StudentOrder::create( str_split($validatedData));

      return redirect()->route('orders.index')->with('success', 'Student for order created successfully');

    }

    public function show(StudentOrder $order)
    {
      return view('orders.show', ['order' => $order]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
