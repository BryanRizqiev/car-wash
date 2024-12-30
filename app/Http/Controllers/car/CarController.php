<?php

namespace App\Http\Controllers\car;

use App\Http\Controllers\Controller;
use App\Http\Requests\car\StoreCarRequest;
use App\Http\Requests\car\UpdateCarRequest;
use App\Http\Requests\car\UpdateStatusRequest;
use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index(Request $req)
    {
        $status = $req->query('status', 'Belum Selesai');
        $cars = Car::with('customer')->where('deleted_at', null)->where('status', $status)->get(['id', 'nopol', 'car_colour', 'price', 'status', 'customer_id', 'created_at']);

        return view('content.car.index', ['cars' => $cars]);
    }

    public function create()
    {
        $customers = Customer::where('deleted_at', null)->get(['id', 'name']);

        return view('content.car.create', ['customers' => $customers]);
    }

    public function edit($id)
    {
        $car = DB::table('car_washs')->where('id', $id)->where('deleted_at', null)->first(['id', 'nopol', 'car_colour', 'price', 'customer_id']);
        $customers = Customer::where('deleted_at', null)->get(['id', 'name']);

        return view('content.car.edit', ['car' => $car, 'customers' => $customers]);
    }

    public function editStatus($id)
    {
        $car = DB::table('car_washs')->where('id', $id)->first(['id', 'status']);
        $status = ['Selesai', 'Belum Selesai', 'Menunggu Pembayaran'];

        return view('content.car.change-status', ['car' => $car, 'status' => $status]);
    }

    public function updateStatus(UpdateStatusRequest $req, $id)
    {
        $dataReq = $req->validated();
        try {
            DB::table('car_washs')->where('id', $id)->update([
                'status' => $dataReq['status']
            ]);
            return redirect()->route('car')->with('success', 'Berhasil update status data cucian');
        } catch (\Throwable $th) {
            info($th->getMessage());
            return back()->with('error', 'Gagal update status data cucian');
        }
    }

    public function update(UpdateCarRequest $req, $id)
    {
        $dataReq = $req->validated();
        try {
            DB::transaction(function () use ($dataReq, $id) {
                $car = Car::find($id);
                $oldCustomer = Customer::find($car->customer_id);
                $newCustomer = Customer::find($dataReq['customer_id']);

                DB::table('car_washs')->where('id', $id)->update([
                    'nopol' => $dataReq['nopol'],
                    'car_colour' => $dataReq['car_colour'],
                    'price' => $dataReq['price'],
                    'customer_id' => $dataReq['customer_id']
                ]);

                if ($oldCustomer->id === $newCustomer->id) {
                    $moneyDiff = $dataReq['price'] - $car->price;
                    $oldCustomer->money_spend += $moneyDiff;
                    $oldCustomer->save();
                } else {
                    $lastWashTime_ = Car::where('customer_id', $newCustomer->id)->where('deleted_at', null)->orderBy('created_at')->first(['created_at'])['created_at'];
                    $newCustomer->money_spend += $dataReq['price'];
                    $newCustomer->wash_total++;
                    $newCustomer->last_wash_time = $lastWashTime_;
                    $newCustomer->save();

                    $lastWashTime = Car::where('customer_id', $oldCustomer->id)->where('deleted_at', null)->orderBy('created_at')->first(['created_at'])['created_at'] ?? null;
                    $oldCustomer->money_spend -= $car->price;
                    $oldCustomer->wash_total--;
                    $oldCustomer->last_wash_time = $lastWashTime;
                    $oldCustomer->save();
                }
            });

            return redirect()->route('car')->with('success', 'Berhasil update data cucian');
        } catch (\Throwable $th) {
            info($th->getMessage());
            return back()->with('error', 'Gagal update data cucian');
        }
    }

    public function store(StoreCarRequest $req)
    {
        $dataReq = $req->validated();
        $dataReq['status'] = 'Belum Selesai';
        $dataReq['created_by'] = $req->user()->id;

        try {
            DB::transaction(function () use ($dataReq) {
                $customer = Customer::find($dataReq['customer_id']);
                if ($customer->wash_total % 5 === 0 && $customer->wash_total !== 0) {
                    $dataReq['price'] = 0;
                    $customer->wash_total++;
                    $customer->last_wash_time = now();
                    $customer->save();
                } else {
                    $customer->money_spend += $dataReq['price'];
                    $customer->wash_total++;
                    $customer->last_wash_time = now();
                    $customer->save();
                }

                Car::create($dataReq);
            });

            return redirect()->route('car')->with('success', 'Berhasil membuat cucian');
        } catch (\Throwable $th) {
            info($th->getMessage());
            return back()->with('error', 'Gagal membuat cucian');
        }
    }

    public function delete($id)
    {
        try {

            DB::transaction(function () use ($id) {
                $car = Car::find($id);
                $oldCustomer = Customer::find($car->customer_id);

                $lastWashTime = Car::where('customer_id', $oldCustomer->id)->where('deleted_at', null)->orderBy('created_at')->first(['created_at'])['created_at'] ?? null;
                $oldCustomer->money_spend -= $car->price;
                $oldCustomer->wash_total--;
                $oldCustomer->last_wash_time = $lastWashTime;
                $oldCustomer->save();

                $car->deleted_at = now();
                $car->save();
            });
            return back()->with('success', 'Berhasil menghapus data cucian');
        } catch (\Throwable $th) {
            info($th->getMessage());
            return back()->with('error', 'Gagal menghapus data cucian');
        }
    }
}
