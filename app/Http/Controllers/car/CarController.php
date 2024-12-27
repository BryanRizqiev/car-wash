<?php

namespace App\Http\Controllers\car;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        return view('content.car.index');
    }
}
