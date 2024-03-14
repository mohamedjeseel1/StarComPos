<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
	<title>POS | Radmin - Laravel Admin Starter</title>
	<!-- initiate head with meta tags, css and script -->
	<?php echo $__env->make('include.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<?php
$products = config('mockdata.products');
shuffle($products);
?>

<body id="app">
	<div class="wrapper">
		<div class="pos-container p-3 pt-0">
			<div class="row">
				<div class="col-sm-1 bg-white h-100vh ">
					<div class="pos top-menu mt-20 text-center">
						<a href="<?php echo e(url('/inventory')); ?>" class="nav-link m-auto mb-10"><i class="ik ik-arrow-left-circle"></i></a>
						<a href="#" class="nav-link m-auto mb-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></a>
						<a class="nav-link m-auto mb-10" href="#" id="notiDropdown"><i class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
						<a class="nav-link m-auto mb-10" href="<?php echo e(url('profile')); ?>"><i class="ik ik-user"></i></a>
						<a class="nav-link m-auto mb-10" href="<?php echo e(url('logout')); ?>">
							<i class="ik ik-power"></i>
						</a>
					</div>
				</div>
				<div class="col-sm-8 bg-white">
					<div class="customer-area">
						<div class="row">
							<div class="col-sm-3">
								<div class="form-group">
									<select class="form-control select2" name="warehouse">
										<option selected="selected" value="">Select Warehouse</option>
										<option value="1">Warehouse 1</option>
										<option value="2">Warehouse 2</option>
									</select>
								</div>
							</div>
							<div class="col-sm-9">
								<div class="form-group">
									<input type="text" name="product" class="form-control" placeholder="Search products">
								</div>
							</div>

						</div>

						<div class="row pos-products layout-wrap" id="layout-wrap">

							<!-- include product preview page -->
							<?php $__currentLoopData = array_slice($products, 0, 8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-2 list-item list-item-grid p-2">
								<div class="card mb-1 pos-product-card" data-info="<?php echo e(htmlentities(json_encode($product))); ?>">
									<div class="d-flex card-img">
										<img src="<?php echo e(asset($product['image'])); ?>" alt="<?php echo e($product['name']); ?>" class="list-thumbnail responsive border-0">
									</div>
									<div class="p-2">
										<p><?php echo e($product['name']); ?> <small class="text-muted"><?php echo e($product['category_name']); ?></small> </p>
										<?php if($product['offer_price']): ?>
										<span class="product-price"><span class="price-symbol">$</span><?php echo e($product['offer_price']); ?></span> <small class="text-red font-15"><s><?php echo e($product['regular_price']); ?></s></small>
										<?php else: ?>
										<span class="product-price"><span class="price-symbol">$</span><?php echo e($product['regular_price']); ?></span>
										<?php endif; ?>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
				</div>
				<div class="col-sm-3 bg-white product-cart-area">
					<div class="product-selection-area">
						<div class="d-flex justify-content-between align-items-center">
							<h5 class="mb-0"> Order Details</h6>
								<i class="text-danger ik ik-refresh-ccw cursor-pointer font-15" onclick="cleartCart()"></i>
						</div>
						<hr>
						<div id="product-cart" class="product-cart mb-3">
							<!-- Uncomment to preview original cart html
							====================================================
							<div class="d-flex justify-content-between position-relative">
								<i class="text-red ik ik-x-circle cart-remove cursor-pointer" onclick="removeCartItem(ID)"></i>
								<div class="cart-image-holder">
									<img src="IMAGE_SRC">
								</div>
								<div class="w-100 p-2">
									<h5 class="mb-2 cart-item-title">ITEM_NAME</h5>
									<div class="d-flex justify-content-between">
										<span class="text-muted">QUANTITYx</span>
										<span class="text-success font-weight-bold cart-item-price">SUBTOTAL</span>
									</div>
								</div>
							</div> -->
						</div>
						<div class="box-shadow p-3">
							<div class="d-flex justify-content-between font-15 align-items-center">
								<span>Subtotal</span>
								<strong id="subtotal-products">0.00</strong>
							</div>
							<div class="d-flex justify-content-between font-15 align-items-center">
								<span>Discount</span>
								<input class="form-control w-90 font-15 text-right" id="discount">
							</div>
							<hr>
							<div class="d-flex justify-content-between font-20 align-items-center">
								<b>Total</b>
								<b id="total-bill">0.00</b>
							</div>
						</div>
						<div class="box-shadow p-3 mb-3">
							<label class="d-block">Customer Information</label>
							<div class="d-block">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Enter Customer Name" value="Christopher Alex">
								</div>
								<div class="form-group">
									<input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="219-122-1234">
								</div>
								<div class="form-group">
									<textarea type="text" name="name" class="form-control h-82px" placeholder="Enter Address" value="Christopher Alex"></textarea>
								</div>
							</div>
						</div>
						<div class="box-shadow p-3">
							<button class="btn btn-danger btn-checkout btn-pos-checkout " data-toggle="modal" data-target="#InvoiceModal">PLACE ORDER</button>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- initiate modal menu section-->
	<?php echo $__env->make('include.modalmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<!-- Preview Invoice Modal -->
	<div class="modal fade edit-layout-modal pr-0 " id="InvoiceModal" role="dialog" aria-labelledby="InvoiceModalLabel" aria-hidden="true">
		<div class="modal-dialog mw-70" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="InvoiceModalLabel">Preview Invoice</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body">
					<div class="card-header">
						<h3 class="d-block w-100">Radmin<small class="float-right">07/10/2021</small></h3>
					</div>
					<div class="card-body">
						
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
						</div>
						<div class="row no-print">
							<div class="col-12">
								<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
								<button type="button" class="btn btn-primary pull-right"><i class="fa fa-download"></i> Generate PDF</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- initiate scripts-->
	<script src="<?php echo e(asset('all.js')); ?>"></script>
	<script src="<?php echo e(asset('dist/js/theme.js')); ?>"></script>
	<script>
		const parser = new DOMParser();

		function decodeString(inputStr) {
			return parser.parseFromString(`<!doctype html><body>${inputStr}`, 'text/html').body.textContent
		}

		var cart = {};
		$(document).on('click', '.pos-product-card', function() {
			var product = JSON.parse(decodeString($(this).data('info')));
			var price = product.offer_price ? product.offer_price : product.regular_price;
			var id = product.id;

			if (cart.hasOwnProperty(id)) {
				cart[id].quantity++;
				cart[id].subtotal = price * cart[id].quantity;
			} else {
				cart[id] = {
					name: product.name,
					image: product.image,
					price: price,
					quantity: 1,
					subtotal: price
				};
			}
			// Update cart table
			updateCartTable();
		});

		$(document).on('keyup', '#discount', function() {
			updateCartTable();
		});

		function removeCartItem(id) {
			delete cart[id];
			updateCartTable();
		}

		function cleartCart() {
			if (confirm('Are you sure to clear cart?')) {
				cart = {};
				$('#discount').val(0)
				updateCartTable();
			}
		}

		// Function to update the cart table
		function updateCartTable() {
			var $cartTable = $('#product-cart'),
				$cartTotal = $('#subtotal-products'),
				$totalText = $('#total-bill');

			var cartTotal = 0,
				discount = $('#discount').val();

			// Empty cart table
			$cartTable.empty();

			// Loop through cart items and add them to cart table
			for (var id in cart) {
				if (cart.hasOwnProperty(id)) {
					var item = cart[id];
					var $tr = `<div class="d-flex justify-content-between position-relative">
								<i class="text-red ik ik-x-circle cart-remove cursor-pointer" onclick="removeCartItem(${id})"></i>
								<div class="cart-image-holder">
									<img src="${item.image}">
								</div>
								<div class="w-100 p-2">
									<h5 class="mb-2 cart-item-title">${item.name}</h5>
									<div class="d-flex justify-content-between">
										<span class="text-muted">${item.quantity}x</span>
										<span class="text-success font-weight-bold cart-item-price">${item.subtotal.toFixed(2)}</span>
									</div>
								</div>
							</div>`;
					$cartTable.append($tr);
					cartTotal += item.subtotal;
				}
			}

			// Update cart total
			$cartTotal.text(cartTotal.toFixed(2));
			$totalText.text((cartTotal - discount).toFixed(2));
		}
	</script>
</body>

</html><?php /**PATH C:\Users\mohommadsu\Downloads\Main File\resources\views/inventory/pos.blade.php ENDPATH**/ ?>