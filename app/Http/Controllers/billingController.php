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
use App\Models\ViewStocks;
use DataTables;
use Auth;

class billingController extends Controller
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
        return view('billing', compact( 'branchs','user', 'invoices'));
    }
    public function search($phone)
    {
            $supplier = Suppliers::where('phone',$phone)->first();
            return  $supplier;
       
    }

    public function add($id, $branch)
    {
        $stock = Stocks::join('products', 'products.id', '=', 'stocks.name')
                              ->where('stocks.name', '=', $id)
                              ->where('stocks.branch', '=', $branch)
                             ->get(['stocks.price_sel','stocks.price','stocks.quantity','stocks.discount','products.name','products.id']) ;

        return  $stock;
       
    }
    public function saveBilling(Request $request){
        $products = json_decode($request->input('data2'));
        foreach ($products as $data) {
            
            $branchID= $data[0];
            $SupplierID = $data[1];
            $productID = $data[2];
            $qn = $data[3];
            $discount = $data[4];
            $price_sel = $data[5];
            $price = $data[6];
            
                if ($stock = Stocks::where('name',$productID)->where('branch',$branchID)->first()) {
                    $totalStock = $stock->quantity + $qn;
                    $payload = [
                        'name' => $productID,
                        'branch' => $branchID,
                        'supplier' => $SupplierID,
                        'quantity' => $totalStock,
                        'unit' => $stock->unit,
                        'price' => $price,
                        'price_sel' => $price_sel,
                        'discount' => $discount,
                        'warranty' => $stock->warranty,
                        'barcode' => $stock->barcode,
                        'alert' => $stock->alert,
                    ];
    
                    $update = $stock->update($payload);

                    $viewStock = new ViewStocks;
                    $viewStock->name = $productID;
                    $viewStock->branch = $branchID;
                    $viewStock->supplier = $SupplierID;
                    $viewStock->quantity = $qn;
                    $viewStock->unit = $stock->unit;
                    $viewStock->price = $price;
                    $viewStock->price_sel = $price_sel;
                    $viewStock->discount = $discount;
                    $viewStock->warranty = $stock->warranty;
                    $viewStock->save();
                }
        }
        return redirect('billing');
    }
}
