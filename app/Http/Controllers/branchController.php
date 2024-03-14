<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branchs;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use DataTables;
use Auth;

class branchController extends Controller
{
    public  function view(){
        return view('branch');
    }
    
    
    public  function store(Request $request): RedirectResponse
    {
    try {
        $name = $request->input('name');
        $phone = $request->input('phone');
        $city = $request->input('city');
        $adress = $request->input('adress');
        $code = $request->input('code');
        $email = $request->input('email');

        $branch = new Branchs;
        $branch->name = $name;
        $branch->phone = $phone;
        $branch->city = $city;
        $branch->adress = $adress;
        $branch->code = $code;
        $branch->email = $email;

        $branch->save();
        if ($branch) {

            return redirect('branch')->with('success', 'New Branch created!');
        }

        return redirect('branch')->with('error', 'Failed to create new branch! Try again.');
        
    }catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }


    public function getBranchList(Request $request): mixed
    {
        $data = Branchs::get();
        $hasManageUser = Auth::user()->can('manage_user');

        return Datatables::of($data)
            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($data->name == 'Super Admin') {
                    return '';
                }
                if ($hasManageUser) {
                    $output = '<div class="table-actions">
                                <a href="#BranchEdit" data-toggle="modal" data-target="#BranchEdit" id="editBranch" data-id="'.$data->id.'"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('delete/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }

                return $output;
            })
            ->make(true);
    }

    public function edit($id)
    {
            $branch = Branchs::find($id);
            return  $branch;
       
    }

    public function delete($id): RedirectResponse
    {
        if ($branch = Branchs::find($id)) {
            $branch->delete();

            return redirect('branch')->with('success', 'Branch removed!');
        }

        return redirect('branch')->with('error', 'Branch not found');
    }

    
    public function update(Request $request): RedirectResponse
    {

        try {
            if ($branch = Branchs::find($request->id)) {
                $payload = [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'city' => $request->city,
                    'adress' => $request->adress,
                    'code' => $request->code,
                    'email' => $request->email,
                ];

                $update = $branch->update($payload);

                return redirect()->back()->with('success', 'Information updated succesfully!');
            }

            return redirect()->back()->with('error', 'Failed to update! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }


}
