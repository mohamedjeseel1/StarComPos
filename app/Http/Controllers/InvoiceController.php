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
use Rawilk\Printing\Facades\Printing;
use Rawilk\Printing\Receipts\ReceiptPrinter;

class InvoiceController extends Controller
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
        return view('pos', compact( 'branchs','user', 'invoices'));
    }

    public function add($id, $branch)
    {
        $stock = Stocks::join('products', 'products.id', '=', 'stocks.name')
                            ->join('units', 'units.id', '=', 'stocks.unit')
                              ->where('stocks.name', '=', $id)
                              ->where('stocks.branch', '=', $branch)
                             ->get(['stocks.price_sel','stocks.quantity','stocks.discount','products.name','products.id', 'units.name as unitname']) ;

      //  $stock = Stocks::where('name',$id)->first();
        return  $stock;
       
    }

    public function search($phone)
    {
            $customer = Customers::where('phone',$phone)->first();
            return  $customer;
       
    }

    public  function saveCustomer(Request $request)
    {

        $name = $request->input('name');
        $phone = $request->input('phone');
        $email = $request->input('email');

        $customer = new Customers;
        $customer->name = $name;
        $customer->phone = $phone;
        $customer->email = $email;

        $customer->save();
        if ($customer) {

            return $customer;
        }
    }
public function print(Request $request){
    // First generate the receipt
$receipt = (string) (new ReceiptPrinter)
->centerAlign()
->text('My heading')
->leftAlign()
->line()
->twoColumnText('Item 1', '2.00')
->twoColumnText('Item 2', '4.00')
->feed(2)
->centerAlign()
->barcode('1234')
->cut();

// Now send the string to your receipt printer
Printing::newPrintTask()
->printer($receiptPrinterId)
->content($text)
->send();
}
    public function saveInvoice(Request $request){
        // Get invoice number
        $invoiceNumber = Invoices1::orderBy('id', 'desc')->skip(0)->take(1)->get('invice_number');
        $number = $invoiceNumber[0]['invice_number'];
        if($number > 0){
            $number = $number + 0001;

           $invoiceDataSets = json_decode($request->input('data2'));
            foreach ($invoiceDataSets as $invoiceDataSet) {
                $name = $invoiceDataSet[1];
                $values = new Invoices1();
                $values->invice_number = $number;
                $values->product_name = $invoiceDataSet[0];
                $values->product_id= $invoiceDataSet[1];
                $values->branch_id = $invoiceDataSet[2];
                $values->unit = $invoiceDataSet[3];
                $values->quantity = $invoiceDataSet[4];
                $values->uni_price = $invoiceDataSet[5];
                $values->discount_per = $invoiceDataSet[6];
                $values->itemprice = $invoiceDataSet[7];
                $values->discount_price = $invoiceDataSet[9];
                $values->amt = $invoiceDataSet[10];
                $values->save();
                
                    if ($stock = Stocks::where('name',$name)->first()) {
                        $totalStock = $stock->quantity - $invoiceDataSet[4];
                        $payload = [
                            'name' => $stock->name,
                            'branch' => $stock->branch,
                            'supplier' => $stock->supplier,
                            'quantity' => $totalStock,
                            'unit' => $stock->unit,
                            'price' => $stock->price,
                            'price_sel' => $stock->price_sel,
                            'discount' => $stock->discount,
                            'warranty' => $stock->warranty,
                            'barcode' => $stock->barcode,
                            'alert' => $stock->alert,
                        ];
        
                        $update = $stock->update($payload);
                    }
            }

            $amoutDataSet = json_decode($request->input('data1'));
                $values1 = new Amouts();
                $values1->invice_number = $number;
                $values1->payment = $amoutDataSet[0];
                $values1->balance = $amoutDataSet[1];
                $values1->status = $amoutDataSet[2];
                $values1->total = $amoutDataSet[3];
                $values1->discount = $amoutDataSet[4];
                $values1->netAmt = $amoutDataSet[5];
                $values1->customer_id = $amoutDataSet[6];
                $values1->branch_id = $amoutDataSet[7];
                $values1->save();
            
         }

        return redirect('pos');
    }
}
