
<div class="row invoice-info">
    <div class="col-sm-12">
        <h4 class="text-right">Invoice #INV007612</h4>
    </div>
    <div class="col-sm-3  invoice-col">
        From
        <address>
            <strong>Themicly,</strong><br>Rajshahi <br>Bangladesh <br>Phone: (088) 016-1707 5540<br>Email: info@themicly.com
        </address>
    </div>
    <div class="col-sm-3 invoice-col">
        To
        <address>
            <strong>John Doe</strong><br>795 Folsom Ave, Suite 600<br>San Francisco, CA 94107<br>Phone: (555) 123-7654<br>Email: john.doe@example.com
        </address>
    </div>
    <div class="col-sm-3 invoice-col text-right">
        <b>Issue Date:</b> Feb 12, 2023<br>
        <b>Due Date:</b> Apr 12, 2023<br>
        <b>Account:</b> 968-34567-1234
    </div>
    <div class="col-sm-3 invoice-col text-right">
        <img height="100" src="<?php echo e(asset('img/qr.png')); ?>" alt="">
    </div>
</div>

<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="wp-10">SL</th>
                    <th class="wp-40">Product</th>
                    <th class="wp-20">Unit Price</th>
                    <th class="wp-15">Qty</th>
                    <th class="wp-15">Discount</th>
                    <th class="wp-15 text-right">Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $invoiceItems = config('mockdata.invoice_items');
                $grandTotal = 0;
                $grandDiscount = 0;

                ?>
                <?php $__currentLoopData = $invoiceItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php

                $subtotal = $product['qty'] * ($product['unit_price'] - $product['discount']);
                $grandTotal += $subtotal;
                ?>
                <tr>
                    <td><?php echo e(($key +  1)); ?></td>
                    <td><?php echo e($product['name']); ?></td>
                    <td><?php echo e($product['unit_price']); ?></td>
                    <td><?php echo e($product['qty']); ?></td>
                    <td><?php echo e(number_format($product['discount'], 2, '.', '')); ?></td>
                    <td class="text-right"><?php echo e(number_format($subtotal, 2, '.', '')); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <img src="<?php echo e(asset('/img/credit/visa.png')); ?>" alt="Visa">
        <img src="<?php echo e(asset('/img/credit/mastercard.png')); ?>" alt="Mastercard">
        <img src="<?php echo e(asset('/img/credit/american-express.png')); ?>" alt="American Express">
        <img src="<?php echo e(asset('/img/credit/paypal2.png')); ?>" alt="Paypal">

        <div class="alert alert-secondary mt-20">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </div>
    </div>
    <div class="col-2"></div>
    <div class="col-4">
        <div class="table-responsive">
            <?php
            $taxAmount = $grandTotal * 0.1;
            $grandTotalWithTax = $grandTotal + $taxAmount;

            ?>
            <table class="table">
                <tbody>
                    <tr>
                        <th class="th-50">Subtotal:</th>
                        <td class="text-right"><?php echo e(number_format($grandTotal, 2, '.', '')); ?></td>
                    </tr>
                    <tr>
                        <th>Tax (10%)</th>
                        <td class="text-right"><?php echo e(number_format($taxAmount, 2, '.', '')); ?></td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td class="text-right"><?php echo e(number_format($grandTotalWithTax, 2, '.', '')); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/common/invoice.blade.php ENDPATH**/ ?>