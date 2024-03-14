<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Amouts;
use App\Models\Invoices1;
use DataTables;
use Auth;

class amountController extends Controller
{
    public  function view(){
        return view('searchInvoice');
    }

    public function getInvoiceList(Request $request): mixed
    {
        $hasManageUser = Auth::user()->can('manage_pos');
        $user = $request->user();
        $branchId = $user->branch_id;
        $data = Amouts::all()
               ->where('branch_id', $branchId);
        //$data = Amounts::where('branch_id',$user->branch_id)->first();

        return Datatables::of($data)
            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($data->name == 'Super Admin') {
                    return '';
                }
                if ($hasManageUser) {
                    $output = '<div class="table-actions">
                                <a href="' . url('invoice/view/' . $data->invice_number) . '" ><i class="ik ik-eye f-18 text-blue"></i></a>
                                <a href="' . url('invoice/delete/' . $data->invice_number) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                            </div>';
                }

                return $output;
            })
            ->make(true);
    }

    public function invoiceView($id)
    {
      
            if($invoices = Invoices1::all()->where('invice_number',$id)){
                return view('viewInvoice', compact( 'invoices'));
            }
        
    }


    public function delete($id): RedirectResponse
    {
        if ($amout = Amouts::where('invice_number',$id)->first()) {
            
            if($invoice = Invoices1::where('invice_number',$id)->first()){
                $invoice->delete();
                $amout->delete();
            return redirect()->back()->with('success', 'Removed!');
            }
        }

        return redirect()->back()->with('error', 'Not found');
    }
}
