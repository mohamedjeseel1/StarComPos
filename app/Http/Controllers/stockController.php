<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Stocks;
use App\Models\Products;
use App\Models\Branchs;
use App\Models\Suppliers;
use App\Models\Units;
use App\Models\User;
use App\Models\ViewStocks;
use DataTables;
use Auth;
class stockController extends Controller
{
    public  function view(){
        $products = Products::all();
        $branchs = Branchs::all();
        $suppliers = Suppliers::all();
        $units = Units::all();
        return view('stock', compact('products', 'branchs','suppliers','units'));
    }

    public  function store(Request $request): RedirectResponse
    {
    try {
        $name = $request->input('name');
        $branch = $request->input('branch');
        $supplier = $request->input('supplier');
        $quantity = $request->input('quantity');
        $unit = $request->input('unit');
        $price = $request->input('price');
        $price_sel = $request->input('price_sel');
        $discount = $request->input('discount');
        $warranty = $request->input('warranty');
        $barcode = $request->input('barcode');
        $alert = $request->input('alert');

        $stock = new Stocks;
        $stock->name = $name;
        $stock->branch = $branch;
        $stock->supplier = $supplier;
        $stock->quantity = $quantity;
        $stock->unit = $unit;
        $stock->price = $price;
        $stock->price_sel = $price_sel;
        $stock->discount = $discount;
        $stock->warranty = $warranty;
        $stock->barcode = $barcode;
        $stock->alert = $alert;

        $viewStock = new ViewStocks;
        $viewStock->name = $name;
        $viewStock->branch = $branch;
        $viewStock->supplier = $supplier;
        $viewStock->quantity = $quantity;
        $viewStock->unit = $unit;
        $viewStock->price = $price;
        $viewStock->price_sel = $price_sel;
        $viewStock->discount = $discount;
        $viewStock->warranty = $warranty;

        if ($stock1 = Stocks::where('name',$name)->first()){

                $totalStock = $stock1->quantity +  $stock->quantity;
                $payload = [
                    'name' => $name,
                    'branch' => $branch,
                    'supplier' => $supplier,
                    'quantity' => $totalStock,
                    'unit' => $unit,
                    'price' => $price,
                    'price_sel' => $price_sel,
                    'discount' => $discount,
                    'warranty' => $warranty,
                    'barcode' => $barcode,
                    'alert' => $alert,
                ];

                $update = $stock1->update($payload);
                $viewStock->save();
                return redirect()->back()->with('success', 'Information updated succesfully!');
         
        }else{
            $stock->save();
            $viewStock->save();
            if ($stock) {
    
                return redirect('stock')->with('success', 'New stock created!');
            }
    
            return redirect('stock')->with('error', 'Failed to create new stock! Try again.');
        }


        
    }catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    public function getStockList(Request $request): mixed
    {
        $user = $request->user();
        $branchId = $user->branch_id;
        $data = Stocks::all()
               ->where('branch', $branchId);
        
        $hasManageUser = Auth::user()->can('can:manage_stock');

        return Datatables::of($data)
        ->addColumn('name', function ($data) use ($hasManageUser) {
            
        $name = Products::find($data->name);
            $output1 = '';
            if ($hasManageUser) {
                $output1 = '
                <div class="table-name">
                            <p data-toggle="modal" >'.$name->name.'</p>
                </div>';
            }

            return $output1;
        })

        

        ->addColumn('supplier', function ($data) use ($hasManageUser) {
            
            $supplier = Suppliers::find($data->supplier);
                $output3 = '';
                if ($hasManageUser) {
                    $output3 = '
                    <div class="table-supplier">
                                <p data-toggle="modal" >'.$supplier->name.'</p>
                    </div>';
                }
    
                return $output3;
            })

            ->addColumn('unit', function ($data) use ($hasManageUser) {
            
                $unit = Units::find($data->unit);
                    $output4 = '';
                    if ($hasManageUser) {
                        $output4 = '
                        <div class="table-unit">
                                    <p data-toggle="modal" >'.$unit->name.'</p>
                        </div>';
                    }
        
                    return $output4;
                })

            ->addColumn('action', function ($data) use ($hasManageUser) {
                $output = '';
                if ($hasManageUser) {
                    $output = '
                    <div class="table-actions">
                            <a href="' . url('stockView/'. $data->branch . '/'. $data->name ) . '" ><i class="ik ik-eye f-18 text-blue"></i></a>
                                <a href="#stockEdit" data-toggle="modal" data-target="#stockEdit" id="editstock" data-id="'.$data->id.'"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                <a href="' . url('stock/delete/' . $data->id) . '"><i class="ik ik-trash-2 f-16 text-red"></i></a>
                    </div>';
                }

                return $output;
            })
            ->rawColumns(['name', 'supplier', 'unit', 'action'])
            ->make(true);
    }

    public function edit($id)
    {
            $stock = Stocks::find($id);
            return  $stock;
       
    }

    public function edit1($id)
    {
            $stock = Stocks::where('name',$id)->first();
            return  $stock;
       
    }

    public function delete($id): RedirectResponse
    {
        if ($stock = Stocks::find($id)) {
            $stock->delete();

            return redirect('stock')->with('success', 'stock removed!');
        }

        return redirect('stock')->with('error', 'stock not found');
    }

    public function update(Request $request): RedirectResponse
    {

        try {
            if ($stock = Stocks::find($request->id)) {
                $payload = [
                    'name' => $request->name,
                    'branch' => $request->branch,
                    'supplier' => $request->supplier,
                    'quantity' => $request->quantity,
                    'unit' => $request->unit,
                    'price' => $request->price,
                    'price_sel' => $request->price_sel,
                    'discount' => $request->discount,
                    'warranty' => $request->warranty,
                    'barcode' => $request->barcode,
                    'alert' => $request->alert,
                ];

                $update = $stock->update($payload);

                return redirect()->back()->with('success', 'Information updated succesfully!');
            }

            return redirect()->back()->with('error', 'Failed to update! Try again.');
        } catch (\Exception $e) {
            $bug = $e->getMessage();

            return redirect()->back()->with('error', $bug);
        }
    }

    //View All Stocks
    public function viewAllStock($branchId, $product)
    {
            $data = ViewStocks::join('products', 'products.id', '=', 'view_stocks.name')
                                ->join('suppliers', 'suppliers.id', '=', 'view_stocks.supplier')
                                  ->where('view_stocks.name', '=', $product)
                                  ->where('view_stocks.branch', '=', $branchId)
                                 ->get(['view_stocks.price_sel','view_stocks.quantity','view_stocks.discount', 'view_stocks.created_at', 'suppliers.name']) ;
    
        return view('viewAllStock', compact('data'));
    }
    public  function stockView(){
        return view('viewAllStock');
    }
}
