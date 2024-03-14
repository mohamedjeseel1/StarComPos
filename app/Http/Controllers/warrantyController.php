<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Stocks;
use App\Models\Invoices1;
use App\Models\Products;
use App\Models\Branchs;
use App\Models\Suppliers;
use App\Models\Units;
use App\Models\User;
use App\Models\Customers;
use App\Models\Amouts;
use DataTables;
use Auth;

class warrantyController extends Controller
{
    public  function view(Request $request){
        $products = Products::all();
        $user = $request->user();
        $branchs = Branchs::find($user->branch_id);
        $branchId = $user->branch_id;
        $invoices = Stocks::join('branchs', 'branchs.id', '=', 'stocks.branch')
                              ->join('products', 'products.id', '=', 'stocks.name')
                              ->where('branchs.id', '=', $branchId)
                             ->get(['products.name','products.id','stocks.price_sel','stocks.quantity','stocks.discount']) ;
        return view('warranty', compact( 'branchs','user', 'invoices'));
    }
}
