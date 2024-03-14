<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Products;
use App\Models\Catagoryes;
use App\Models\Brands;
use App\Models\User;
use DataTables;
use Auth;

class ProductController extends Controller
{
    public  function view(){
        $categoryes = Catagoryes::all();
        $brands = Brands::all();
        return view('product', compact('categoryes', 'brands'));
    }

    public  function store(Request $request): RedirectResponse
    {
    try {
        $name = $request->input('name');
        $category = $request->input('category');
        $brand = $request->input('brand');

        $product = new Products;
        $product->name = $name;
        $product->category = $category;
        $product->brand = $brand;

        $product->save();
        if ($product) {

            return redirect('product')->with('success', 'New product created!');
        }

        return redirect('product')->with('error', 'Failed to create new product! Try again.');
        
    }catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    public function getproductList(Request $request): mixed
    {
        $data = Products::get();
        $hasManageUser = Auth::user()->can('can:manage_product');

        return Datatables::of($data)
        ->addColumn('category', function ($data) use ($hasManageUser) {
            
        $category = Catagoryes::find($data->category);
            $output1 = '';
            if ($data->name == 'Super Admin') {
                return '';
            }
            if ($hasManageUser) {
                $output1 = '
                <div class="table-category">
                            <p data-toggle="modal" >'.$category->name.'</p>
                </div>';
            }

            return $output1;
        })

        ->addColumn('brand', function ($data) use ($hasManageUser) {
            
        $brand = Brands::find($data->brand);
            $output2 = '';
            if ($data->name == 'Super Admin') {
                return '';
            }
            if ($hasManageUser) {
                $output2 = '
                <div class="table-brand">
                            <p data-toggle="modal" >'.$brand->name.'</p>
                </div>';
            }

            return $output2;
        })

            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($data->name == 'Super Admin') {
                    return '';
                }
                if ($hasManageUser) {
                    $output = '
                    <div class="table-actions">
                                <a href="#productEdit" data-toggle="modal" data-target="#productEdit" id="editproduct" data-id="'.$data->id.'"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('product/delete/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                    </div>';
                }

                return $output;
            })
            ->rawColumns(['category', 'brand', 'action'])
            ->make(true);
    }

    public function edit($id)
    {
            $product = Products::find($id);
            return  $product;
       
    }

    public function delete($id): RedirectResponse
    {
        if ($product = Products::find($id)) {
            $product->delete();

            return redirect('product')->with('success', 'product removed!');
        }

        return redirect('product')->with('error', 'product not found');
    }


    public function update(Request $request): RedirectResponse
    {

        try {
            if ($product = Products::find($request->id)) {
                $payload = [
                    'name' => $request->name,
                    'category' => $request->category,
                    'brand' => $request->brand,
                ];

                $update = $product->update($payload);

                return redirect()->back()->with('success', 'Information updated succesfully!');
            }

            return redirect()->back()->with('error', 'Failed to update! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }
}
