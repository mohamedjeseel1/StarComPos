<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Units;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use DataTables;
use Auth;
use Illuminate\View\View;

class UnitController extends Controller
{
    public  function index(): View{
        return view('unit');
    }

    public  function store(Request $request): RedirectResponse
    {
    try {
        $name = $request->input('name');
        $details = $request->input('details');

        $unit = new Units;
        $unit->name = $name;
        $unit->details = $details;

        $unit->save();
        if ($unit) {

            return redirect('unit')->with('success', 'New Unit created!');
        }

        return redirect('unit')->with('error', 'Failed to create new unit! Try again.');
        
    }catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    public function getUnitList(Request $request): mixed
    {
        $data = Units::get();
        $hasManageUser = Auth::user()->can('can:manage_product');

        return Datatables::of($data)
            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($data->name == 'Super Admin') {
                    return '';
                }
                if ($hasManageUser) {
                    $output = '<div class="table-actions">
                                <a href="#unitEdit" data-toggle="modal" data-target="#unitEdit" id="editunit" data-id="'.$data->id.'"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('unit/delete/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }

                return $output;
            })
            ->make(true);
    }

    public function edit($id)
    {
            $unit = Units::find($id);
            return  $unit;
       
    }

    public function delete($id): RedirectResponse
    {
        if ($unit = Units::find($id)) {
            $unit->delete();

            return redirect('unit')->with('success', 'Unit removed!');
        }

        return redirect('unit')->with('error', 'Unit not found');
    }


    public function update(Request $request): RedirectResponse
    {

        try {
            if ($unit = Units::find($request->id)) {
                $payload = [
                    'name' => $request->name,
                    'details' => $request->details,
                ];

                $update = $unit->update($payload);

                return redirect()->back()->with('success', 'Information updated succesfully!');
            }

            return redirect()->back()->with('error', 'Failed to update! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

}
