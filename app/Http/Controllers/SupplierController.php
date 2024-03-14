<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliers;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use DataTables;
use Auth;
use Illuminate\View\View;

class SupplierController extends Controller
{
    public  function view(): View{
        return view('supplier');
    }

    public  function store(Request $request): RedirectResponse
    {
    try {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $address = $request->input('address');

        $supplier = new Suppliers;
        $supplier->name = $name;
        $supplier->phone = $phone;
        $supplier->email = $email;
        $supplier->address = $address;

        $supplier->save();
        if ($supplier) {

            return redirect('supplier')->with('success', 'New supplier created!');
        }

        return redirect('supplier')->with('error', 'Failed to create new supplier! Try again.');
        
    }catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    public function getSupplierList(Request $request): mixed
    {
        $data = Suppliers::get();
        $hasManageUser = Auth::user()->can('can:manage_product');

        return Datatables::of($data)
            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($data->name == 'Super Admin') {
                    return '';
                }
                if ($hasManageUser) {
                    $output = '<div class="table-actions">
                                <a href="#supplierEdit" data-toggle="modal" data-target="#supplierEdit" id="editsupplier" data-id="'.$data->id.'"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('supplier/delete/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }

                return $output;
            })
            ->make(true);
    }

    public function edit($id)
    {
            $supplier = Suppliers::find($id);
            return  $supplier;
       
    }

    public function delete($id): RedirectResponse
    {
        if ($supplier = Suppliers::find($id)) {
            $supplier->delete();

            return redirect('supplier')->with('success', 'supplier removed!');
        }

        return redirect('supplier')->with('error', 'supplier not found');
    }


    public function update(Request $request): RedirectResponse
    {

        try {
            if ($supplier = Suppliers::find($request->id)) {
                $payload = [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                ];

                $update = $supplier->update($payload);

                return redirect()->back()->with('success', 'Information updated succesfully!');
            }

            return redirect()->back()->with('error', 'Failed to update! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }
}
