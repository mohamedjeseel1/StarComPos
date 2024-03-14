 
<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('content'); ?>
    <!-- push external head elements to head -->
    <?php $__env->startPush('head'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('plugins/DataTables/datatables.min.css')); ?>">
    <?php $__env->stopPush(); ?>
    <div class="container ">
       

        <div class="card">
            <div class="card-header text-center">
              <h4>Return</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <form action="" id="saveCustomer">
                            <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <span class="input-group-text" >Customer Number</span>
                            <input type="text" class="form-control"  id="phone" name="phone" placeholder="Customer phone number" onchange="search()" required >
                            <input type="text" class="form-control CustomerID"  id="CustomerID" name="phone" hidden>
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
                <form action="" id="savereturn">
                  
                <table class="table table-bordered">
                    <thead class="table-success">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
                        <th scope="col" class="text-end">Qty</th>
                        <th scope="col" class="text-end">Price</th>
                        <th scope="col" class="NoPrint">    
                        </th>

                      </tr>
                    </thead>
                    <tbody id="TBody">
                      <tr id="TRow" class="d-none">
                        <th scope="row">1</th>
                        <td><input type="text" class="form-control productName" name="productName"></td>
                        <td><input type="number" class="form-control text-end qty"  name="qty"></td>
                        <td><input type="number" class="form-control text-end price_sel" name="price_sel">
                            <input type="number" class="form-control text-end productId" name="productId" value="0" hidden>
                        </td>
                          <td class="NoPrint"><button type="button" class="btn btn-sm btn-danger" onclick="BtnDel(this)">X</button></td>
                       
                    </tbody>
                  </table>
                </form>
                <div class="row">
                    <div class="col-12">
                        <div class="input-group mb-3">
                            <button type="button" style="width: 100%" class="btn btn-success" onclick="savereturn()">Save</button>
                        </div>
                    </div>
                </div>
            
             </div>
          </div>

    </div>

    <script>

function savereturn(){
        var token = $('#token').val();
        var branch_id = $('#branch_id').val();
        var CustomerID = $('#CustomerID').val();
        var productIds =  document.getElementsByName("productId");
        var qty =  document.getElementsByName("qty");
        var price_sels =  document.getElementsByName("price_sel");
        

        var data2 = [];
        for (let index = 1; index < productIds.length; index++)
    {
        var productId = productIds[index].value;
        var qn = qty[index].value;
        var price_sel = price_sels[index].value;
        data2.push([branch_id, CustomerID, productId, qn, price_sel]);
        
    }
    console.log(data2);
    var returnDataSet = JSON.stringify(data2);

                            
    url =  "return/savereturn";
                    $.ajax({
                        method: "POST",
                        url: url,
                      data: { 'data2':returnDataSet },
                        success: function(result) {
                            alert("Stock Updated!");
                            console.log(result);
                            window.location.href = '/return' ;
                        },
                        error: function(){
                            alert('failed...');
                        }
                        });
    }



function saveCustomer(){
    var token = $('#token').val();
    formulario =  $("#saveCustomer");
          url =  "return/saveCustomer";
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: formulario.serialize(),
                        success: function(data) {
                            alert("New Customer created!");
                            $('#name').val(data.name);
                            $('#email').val(data.email);
                            $('#CustomerID').val(data.id);
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
    var url = "return/search/"+phone;
    $.ajax({
            url : url ,
            type: 'get',
            success: function (data)
            { console.log(data)
                 $('#name').val(data.name);
                 $('#email').val(data.email);
                 $('#CustomerID').val(data.id);
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
                var branch_id = $('#branch_id').val();
                var ur = "return/add/"+stockId+"/"+branch_id;
                console.log(ur);
         $.ajax({
            url : ur ,
            type: 'get',
            success: function (data)
            {
				     /*Add Button*/
    var v = $("#TRow").clone().appendTo("#TBody") ;
    $(v).find(".productName").val(data[0].name);
    $(v).find(".productId").val(data[0].id);
    $(v).find(".qty").attr({ "min" : 0 });
    $(v).find(".price_sel").val(data[0].price_sel);

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
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/return.blade.php ENDPATH**/ ?>