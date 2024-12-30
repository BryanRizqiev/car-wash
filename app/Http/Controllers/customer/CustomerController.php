<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\StoreCustomerRequest;
use App\Http\Requests\customer\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('deleted_at', null)->get(['id', 'name', 'address', 'money_spend', 'wash_total', 'last_wash_time', 'phone_number']);

        return view('content.customer.index', ['customers' => $customers]);
    }

    public function edit($id)
    {
        $customer = DB::table('customers')->where('id', $id)->where('deleted_at', null)->first(['id', 'name', 'address', 'phone_number']);

        return view('content.customer.edit', ['customer' => $customer]);
    }

    public function create()
    {
        return view('content.customer.create');
    }

    public function store(StoreCustomerRequest $req)
    {
        $dataReq = $req->validated();
        $dataReq['money_spend'] = 0;
        $dataReq['wash_total'] = 0;
        $dataReq['created_by'] = $req->user()->id;

        try {
            Customer::create($dataReq);
            return redirect()->route('customer')->with('success', 'Berhasil membuat pelanggan');
        } catch (\Throwable $th) {
            info($th->getMessage());
            return back()->with('error', 'Gagal membuat pelanggan');
        }
    }

    public function delete($id)
    {
        try {
            DB::table('customers')->where('id', $id)->update(['deleted_at' => now()]);
            return back()->with('success', 'Berhasil menghapus pelanggan');
        } catch (\Throwable $th) {
            info($th->getMessage());
            return back()->with('error', 'Gagal menghapus pelanggan');
        }
    }

    public function update(UpdateCustomerRequest $req, $id)
    {
        $dataReq = $req->validated();
        try {
            DB::table('customers')->where('id', $id)->where('deleted_at', null)->update([
                'name' => $dataReq['name'],
                'address' => $dataReq['address'],
                'phone_number' => $dataReq['phone_number']
            ]);
            return redirect()->route('customer')->with('success', 'Berhasil update pelanggan');
        } catch (\Throwable $th) {
            info($th->getMessage());
            return back()->with('error', 'Gagal menghapus pelanggan');
        }
    }
}
