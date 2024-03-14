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
use App\Models\Returns;
use DataTables;
use Auth;

class returnController extends Controller
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
        return view('return', compact( 'branchs','user', 'invoices'));
    }

    public function search($phone)
    {
            $customer = Customers::where('phone',$phone)->first();
            return  $customer;
       
    }

    public function add($id, $branch)
    {
        $stock = Stocks::join('products', 'products.id', '=', 'stocks.name')
                              ->where('stocks.name', '=', $id)
                              ->where('stocks.branch', '=', $branch)
                             ->get(['stocks.price_sel','stocks.quantity','products.name','products.id']) ;

        return  $stock;
       
    }
    public function saveReturn(Request $request){
        $products = json_decode($request->input('data2'));
        foreach ($products as $data) {
            
            $branchID= $data[0];
            $CustomerID = $data[1];
            $productID = $data[2];
            $qn = $data[3];
            $price_sel = $data[4];
            
                if ($stock = Stocks::where('name',$productID)->where('branch',$branchID)->first()) {
                    $totalStock = $stock->quantity - $qn;
                    $payload = [
                        'name' => $productID,
                        'branch' => $branchID,
                        'supplier' => $stock->supplier,
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

                    

                    $return = new Returns;
                    $return->name = $productID;
                    $return->branch_id = $branchID;
                    $return->supplier_id = $SupplierID;
                    $return->customer_id = $CustomerID;
                    $return->price_sel = $price_sel;
                    $return->status = 'Pending';
                    for($i = 1; $i <= $qn; $i++){
                        $return->quantity = $i;
                        $return->save();
                    }
                    
                }
        }
        return redirect('return');
    }
}
