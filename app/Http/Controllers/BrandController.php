<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brands;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use DataTables;
use Auth;

class BrandController extends Controller
{
    public  function view(){
        return view('brand');
    }

    public  function store(Request $request): RedirectResponse
    {
    try {
        $name = $request->input('name');
        $details = $request->input('details');

        $brand = new Brands;
        $brand->name = $name;
        $brand->details = $details;

        $brand->save();
        if ($brand) {

            return redirect('brand')->with('success', 'New brand created!');
        }

        return redirect('brand')->with('error', 'Failed to create new brand! Try again.');
        
    }catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    public function getBrandList(Request $request): mixed
    {
        $data = brands::get();
        $hasManageUser = Auth::user()->can('can:manage_product');

        return Datatables::of($data)
            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($data->name == 'Super Admin') {
                    return '';
                }
                if ($hasManageUser) {
                    $output = '<div class="table-actions">
                                <a href="#brandEdit" data-toggle="modal" data-target="#brandEdit" id="editbrand" data-id="'.$data->id.'"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('brand/delete/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }

                return $output;
            })
            ->make(true);
    }

    public function edit($id)
    {
            $brand = Brands::find($id);
            return  $brand;
       
    }

    public function delete($id): RedirectResponse
    {
        if ($brand = Brands::find($id)) {
            $brand->delete();

            return redirect('brand')->with('success', 'brand removed!');
        }

        return redirect('brand')->with('error', 'brand not found');
    }


    public function update(Request $request): RedirectResponse
    {

        try {
            if ($brand = Brands::find($request->id)) {
                $payload = [
                    'name' => $request->name,
                    'details' => $request->details,
                ];

                $update = $brand->update($payload);

                return redirect()->back()->with('success', 'Information updated succesfully!');
            }

            return redirect()->back()->with('error', 'Failed to update! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }
}
