<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use DataTables;
use Auth;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public  function view(): View{
        return view('customer');
    }

    public  function store(Request $request): RedirectResponse
    {
    try {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');

        $customer = new Customers;
        $customer->name = $name;
        $customer->phone = $phone;
        $customer->email = $email;

        $customer->save();
        if ($customer) {

            return redirect('customer')->with('success', 'New customer created!');
        }

        return redirect('customer')->with('error', 'Failed to create new customer! Try again.');
        
    }catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    public function getCustomerList(Request $request): mixed
    {
        $data = Customers::get();
        $hasManageUser = Auth::user()->can('can:manage_user');

        return Datatables::of($data)
            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($data->name == 'Super Admin') {
                    return '';
                }
                if ($hasManageUser) {
                    $output = '<div class="table-actions">
                                <a href="#customerEdit" data-toggle="modal" data-target="#customerEdit" id="editcustomer" data-id="'.$data->id.'"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('customer/delete/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }

                return $output;
            })
            ->make(true);
    }

    public function edit($id)
    {
            $customer = Customers::find($id);
            return  $customer;
       
    }

    public function delete($id): RedirectResponse
    {
        if ($customer = Customers::find($id)) {
            $customer->delete();

            return redirect('customer')->with('success', 'customer removed!');
        }

        return redirect('customer')->with('error', 'customer not found');
    }


    public function update(Request $request): RedirectResponse
    {

        try {
            if ($customer = customers::find($request->id)) {
                $payload = [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                ];

                $update = $customer->update($payload);

                return redirect()->back()->with('success', 'Information updated succesfully!');
            }

            return redirect()->back()->with('error', 'Failed to update! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }
}
