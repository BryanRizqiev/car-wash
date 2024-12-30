<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
  public function index()
  {
    $customer_count = DB::table('customers')->where('deleted_at', null)->whereBetween(
      'created_at',
      [
        now()->startOfMonth(),
        now()->endOfMonth()
      ]
    )
      ->count();

    $cars = DB::table('car_washs')->where('deleted_at', null)->whereBetween(
      'created_at',
      [
        now()->startOfMonth(),
        now()->endOfMonth()
      ]
    );

    $car_count = $cars->count();
    $earning = $cars->sum('price');

    return view('content.dashboard.index', compact('customer_count', 'car_count', 'earning'));
  }
}
