 
<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('content'); ?>
    <!-- push external head elements to head -->
    <?php $__env->startPush('head'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('plugins/DataTables/datatables.min.css')); ?>">
    <?php $__env->stopPush(); ?>
    <div class="container ">
       

        <div class="card">
            <div class="card-header text-center">
              <h4>INVOICE</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <form action="" id="saveCustomer">
                            <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Customer Number</span>
                            <input type="text" class="form-control"  id="phone" name="phone" placeholder="Customer phone number" onchange="search()" required >
                        </div>
            
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Customer Name</span>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" required >
                        </div>
            
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Customer Email</span>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Customer Email"  required>
                        </div>
                    </div>
                    <div class="col-4">
                      
                        <div class="input-group mb-3">
                            <button type="button" style="width: 100%" class="btn btn-primary" onclick="search()">Search Customer</button>
                           
                        </div>

                        <div class="input-group mb-3">
                            <button type="button" style="width: 100%" class="btn btn-success" onclick="saveCustomer()">Save New Customer</button>
                        </div>
                    </form>


                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?php if($branchs): ?>
                            <input type="text" disabled name="branch" id="branch" value="<?php echo e($branchs->name); ?>" class="form-control" >
                            <input type="text"  name="branch_id" id="branch_id" value="<?php echo e($branchs->id); ?>" class="form-control" hidden >
                            <?php endif; ?>
                              
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <select class="form-control select2" id="selectProduct" onchange="BtnAdd()">
                                <option selected="selected" value=""  data-select2-id="9">Select Product</option>
                                <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($product->id); ?>"><?php echo e($product->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <form action="" id="saveInvoice">
                  
                <table class="table table-bordered">
                    <thead class="table-success">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col" class="text-end">Qty</th>
                        <th scope="col" class="text-end">Unit Price</th>
                        <th scope="col" class="text-end">Discount %</th>
                        <th scope="col" class="text-end">Price</th>
                        <th scope="col" class="text-end">Discound Price</th>
                        <th scope="col" class="NoPrint">    
                        </th>

                      </tr>
                    </thead>
                    <tbody id="TBody">
                      <tr id="TRow" class="d-none">
                        <th scope="row">1</th>
                        <td><input type="text" class="form-control productName" name="productName"></td>
                        <td><input type="number" class="form-control text-end qty"  name="qty" onchange="Calc(this);"></td>
                        <td><input type="number" class="form-control text-end dic" name="dic" disabled=""></td>
                        <td><input type="number" class="form-control text-end rate" name="rate"  min = '0' onchange="Calc(this);"></td>
                        <td><input type="number" class="form-control text-end" name="priceAmt" value="0" disabled="">
                            <input type="number" class="form-control text-end price" name="price" value="0" hidden>
                            <input type="number" class="form-control text-end dicPrice" name="dicPrice" value="0" hidden>
                            <input type="number" class="form-control text-end productId" name="productId" value="0" hidden>
                            <input type="text" class="form-control text-end unitName" name="unitName" value="0" hidden>
                        </td>
                        <td><input type="number" class="form-control text-end" name="amt" value="0" disabled=""></td>
                        <td class="NoPrint"><button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)">X</button></td>
                      </tr>
                    </tbody>
                  </table>
                </form>
                
                  <div class="row">
                    <div class="col-8">

                        <div class="input-group mb-3">
                            <span class="input-group-text" >Payment Amt Rs.</span>
                            <input type="number" class="form-control text-end" id="payment" name="payment" onchange="balance()">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Balance Rs.</span>
                            <input type="number" class="form-control text-end" id="balance" name="balance" disabled="">
                        </div>
                        <div class="input-group mb-3">
                        <select class="form-control select2" name="selectStatus" id="selectStatus">
                            <option selected="selected" value=""  >Select Status</option>
                            <option value="completed"  >Completed</option>
                            <option value="pendding"  >Pendding</option>
                        </select>
                    </div>
                    

                    </div>
                    
                    <div class="col-4">
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Total Rs.</span>
                            <input type="number" class="form-control text-end" id="FTotal" name="FTotal" disabled="">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Discount Rs.</span>
                            <input type="number" class="form-control text-end" id="FGST" name="FGST" disabled="" onchange="GetTotal()">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Net Amt Rs.</span>
                            <input type="number" class="form-control text-end" id="FNet" name="FNet" disabled="">
                            <input type="number" class="form-control text-end" id="customerID" name="customer_id" hidden>
                        </div>

                    </div>
                
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <button type="button" style="width: 100%" class="btn btn-success" onclick="saveInvoice()">Save</button>
                            <a href="invoice/print">print</a>
                        </div>
                    </div>
                </div>
            
             </div>
          </div>

    </div>

    <script>

function saveInvoice(){
        var token = $('#token').val();
        var productName =  document.getElementsByName("productName");
        var productIds =  document.getElementsByName("productId");
        var unitnames =  document.getElementsByName("unitName");
        var qty =  document.getElementsByName("qty");
        var dic =  document.getElementsByName("dic");
        var rates =  document.getElementsByName("rate");
        var priceAmts =  document.getElementsByName("priceAmt");
        var prices =  document.getElementsByName("price");
        var dicPrices =  document.getElementsByName("dicPrice");
        var amts =  document.getElementsByName("amt");
        

        var payment =  $("#payment").val();
        var balance =  $("#balance").val();
        var status =  $("#selectStatus").val();
        var total =  $("#FTotal").val();
        var discount =  $("#FGST").val();
        var netAmt =  $("#FNet").val();
        var customer_id =  $("#customerID").val();
        var branch_id =  $("#branch_id").val();

        data1 = [payment, balance, status, total, discount, netAmt, customer_id, branch_id ]

        var data2 = [];
        for (let index = 1; index < productName.length; index++)
    {
        var product = productName[index].value;
        var productId = productIds[index].value;
        var qn = qty[index].value;
        var unitname = unitnames[index].value;
        var unitPrice = dic[index].value;
        var discountP = rates[index].value;
        var itemprice = priceAmts[index].value;
        var price = prices[index].value;
        var dicPrice = dicPrices[index].value;
        var amt = amts[index].value;
        data2.push([product, productId, branch_id, unitname, qn, unitPrice, discountP, itemprice, price, dicPrice, amt]);
        
    }
    console.log(data2);
    console.log(data1);
    var amountDataSet = JSON.stringify(data1);
    var invoiceDataSet = JSON.stringify(data2);

                            
    url =  "invoice/saveinvoice";
                    $.ajax({
                        method: "POST",
                        url: url,
                      data: { 'data1':amountDataSet, 'data2':invoiceDataSet },
                        success: function(result) {
                            alert("New Invoice  created!");
                            window.location.href = '/invoice' ;
                        },
                        error: function(){
                            alert('failed...');
                        }
                        });
    }

function balance(){
    var payment =  $('#payment').val();
    var net =  $('#FNet').val();
    var balance = payment - net;
    $('#balance').val(balance);
}


function saveCustomer(){
    var token = $('#token').val();
    formulario =  $("#saveCustomer");
          url =  "invoice/savecustomer";
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: formulario.serialize(),
                        success: function(data) {
                            alert("New customer created!");
                            $('#name').val(data.name);
                            $('#email').val(data.email);
                            $('#customerID').val(data.id);
                            $('#phone').val(data.phone);
                        },
                        error: function(){
                            alert('failed...');
                        }
                        });
 }

function search(){
    var token = $('#token').val();
    var phone = $("#phone").val();
    var url = "invoice/search/"+phone;
    $.ajax({
            url : url ,
            type: 'get',
            success: function (data)
            { console.log(data)
                 $('#name').val(data.name);
                 $('#email').val(data.email);
                 $('#customerID').val(data.id);
            },
            error: function()
            {
                alert('failed...');

            }
        }); 

}

        function GetPrint()
{
    /*For Print*/
    window.print();
}

function BtnAdd()
{
    var selectVal = $("#selectProduct").val();
                let stockId = selectVal;
                var token = $('#token').val();
                var ur = "invoice/add/"+stockId;
                console.log(ur);
         $.ajax({
            url : ur ,
            type: 'get',
            success: function (data)
            {
				     /*Add Button*/
                     console.log(data[0]);
    var v = $("#TRow").clone().appendTo("#TBody") ;
    $(v).find(".productName").val(data[0].name);
    $(v).find(".unitName").val(data[0].unitname);
    $(v).find(".productId").val(data[0].id);
    $(v).find(".qty").attr({
"max" : data[0].quantity, // substitute your own
"min" : 0 // values (or variables) here
});
$(v).find(".dic").val(data[0].price_sel);
    $(v).find(".rate").val(data[0].discount);

    $(v).removeClass("d-none");
    $(v).find("th").first().html($('#TBody tr').length - 1);
            },
            error: function()
            {
                alert('failed...');

            }
        }); 


}

function BtnDel(v)
{
    /*Delete Button*/
       $(v).parent().parent().remove(); 
       GetTotal();

        $("#TBody").find("tr").each(
        function(index)
        {
           $(this).find("th").first().html(index);
        }

       );
}

function Calc(v)
{
    /*Detail Calculation Each Row*/
    var index = $(v).parent().parent().index();
    
    var qty = document.getElementsByName("qty")[index].value;
    //Discount
    var dic = document.getElementsByName("rate")[index].value;

    //selling price
    var  rate = document.getElementsByName("dic")[index].value;

    //real price
    var pro_price = document.getElementsByName("price")[index].value;
    var profit_amt = qty * pro_price


    var amt = qty * rate;
    var priceAmt = amt

     //Discound Price
    var dicPrice  = amt * dic / 100;;
   
    amt = amt - dicPrice;
    document.getElementsByName("amt")[index].value = amt;
    //Discound Price
    document.getElementsByName("dicPrice")[index].value = dicPrice;

    //Discount Price Amount
    document.getElementsByName("priceAmt")[index].value = priceAmt;
    GetTotal();
}

function GetTotal()
{
    /*Footer Calculation*/   

    var sum=0, totalDiscound=0;
    var amts =  document.getElementsByName("priceAmt");
    var dicPrices =  document.getElementsByName("dicPrice");
    

    for (let index = 0; index < amts.length; index++)
    {
        var amt = amts[index].value;
        sum = +(sum) +  +(amt) ; 

        var dicPrice = dicPrices[index].value;
        totalDiscound = +(totalDiscound) +  +(dicPrice) ; 
    }

    document.getElementById("FTotal").value = sum;

    var gst =  document.getElementById("FGST").value = totalDiscound;
    var net = +(sum) + -(gst);
    document.getElementById("FNet").value = net;

}


    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/pos.blade.php ENDPATH**/ ?>