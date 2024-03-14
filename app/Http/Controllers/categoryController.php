<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagoryes;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use DataTables;
use Auth;

class categoryController extends Controller
{
    public  function view(){
        return view('category');
    }

    public  function store(Request $request): RedirectResponse
    {
    try {
        $name = $request->input('name');
        $details = $request->input('details');

        $category = new Catagoryes;
        $category->name = $name;
        $category->details = $details;

        $category->save();
        if ($category) {

            return redirect('category')->with('success', 'New category created!');
        }

        return redirect('category')->with('error', 'Failed to create new category! Try again.');
        
    }catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    public function getCategoryList(Request $request): mixed
    {
        $data = Catagoryes::get();
        $hasManageUser = Auth::user()->can('can:manage_product');

        return Datatables::of($data)
            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($data->name == 'Super Admin') {
                    return '';
                }
                if ($hasManageUser) {
                    $output = '<div class="table-actions">
                                <a href="#categoryEdit" data-toggle="modal" data-target="#categoryEdit" id="editcategory" data-id="'.$data->id.'"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('category/delete/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }

                return $output;
            })
            ->make(true);
    }

    public function edit($id)
    {
            $category = Catagoryes::find($id);
            return  $category;
       
    }

    public function delete($id): RedirectResponse
    {
        if ($category = Catagoryes::find($id)) {
            $category->delete();

            return redirect('category')->with('success', 'category removed!');
        }

        return redirect('category')->with('error', 'category not found');
    }


    public function update(Request $request): RedirectResponse
    {

        try {
            if ($category = Catagoryes::find($request->id)) {
                $payload = [
                    'name' => $request->name,
                    'details' => $request->details,
                ];

                $update = $category->update($payload);

                return redirect()->back()->with('success', 'Information updated succesfully!');
            }

            return redirect()->back()->with('error', 'Failed to update! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }
}
