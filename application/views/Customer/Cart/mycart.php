<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Main START -->
	<section class="pt-3 pt-lg-5">
		<div class="container">
			<div class="row g-4 g-lg-5">

				<!-- Left side START -->
				<div class="col-lg-8">
					<?php if ($this->session->flashdata('success')) : ?>
						<div class="alert alert-success">
							<?php echo $this->session->flashdata('success'); ?>
						</div>
					<?php endif; ?>
					<!-- My Cart START -->
					<div class="card bg-transparent">
						<?php echo form_open('customer/cart/update', 'class="mt-4"'); ?>
						<!-- Card header -->
						<div class="card-header border-bottom d-flex justify-content-between align-items-center px-0 pb-3">
							<h4 class="card-title mb-0">My Cart</h4>
							<span><?php echo $jmlItem; ?> Item</span>
						</div>

						<!-- Card body -->
						<div class="card-body p-0 pt-4">
							<?php foreach ($cart as $c) : ?>
								<!-- Product item START -->
								<div class="row">
									<!-- Image -->
									<div class="col-5 col-md-2">
										<!-- Check box -->
										<div class="form-check">
											<?php if ($c->stock > 0) : ?>
												<?php if ($c->status == 1) : ?>
													<small class="text-success">Updated</small>
													<input checked class="form-check-input" name="cart_id[]" type="checkbox" value="<?php echo $c->id; ?>" id="productCheck">
												<?php else : ?>
													<input class="form-check-input" name="cart_id[]" type="checkbox" value="<?php echo $c->id; ?>" id="productCheck">
												<?php endif; ?>
											<?php else : ?>
												<input hidden class="form-check-input" name="cart_id[]" type="checkbox" value="<?php echo $c->id; ?>" id="productCheck">


											<?php endif; ?>
										</div>

										<div class="bg-light p-2 rounded-2">
											<img src="<?= base_url() ?>assets/images/shop/<?php echo $c->image; ?>" alt="">
										</div>
									</div>

									<div class="col-7 col-md-10">
										<div class="row g-2">
											<!-- Content -->
											<div class="col-md-7">
												<!-- Product detail START -->
												<h5 class="mb-1"><a href="<?= base_url() ?>index.php/detail-product/<?php echo $c->item_id; ?>"><?php echo $c->item_name; ?></a></h5>
												<?php if ($c->stock > 0) : ?>
													<small class="text-success">In Stock</small>

												<?php else : ?>
													<small class="text-danger">stock kosong</small>

												<?php endif; ?>
												<!-- List -->
												<ul class="nav nav-divider small align-items-center mt-1">

													<li class="nav-item">Color: <?php echo $c->color; ?></li>
													<li class="nav-item">Stock: <?php echo $c->stock; ?></li>
												</ul>
											</div>

											<!-- Select -->
											<div class="col-md-2">
												<select name="jumlah_item[<?php echo $c->id; ?>]" class="form-select form-select-sm" aria-label="Default select example">
													<option value="1" <?php echo ($c->jumlah_item == 1) ? 'selected' : ''; ?>>01</option>
													<option value="2" <?php echo ($c->jumlah_item == 2) ? 'selected' : ''; ?>>02</option>
													<option value="3" <?php echo ($c->jumlah_item == 3) ? 'selected' : ''; ?>>03</option>
												</select>


											</div>

											<!-- Price and button -->
											<div class="col-md-3 text-md-end">
												<h5>Rp.<?php echo $c->item_price; ?></h5>
												<!-- Buttons -->
												<div class="hstack gap-1 flex-wrap text-primary-hover mt-2 justify-content-md-end">
													<a href="<?= base_url() ?>index.php/delete-item-cart/<?php echo $c->id; ?>" class="text-reset small"><i class="bi bi-trash3 me-2"></i>Remove</a>
													<!-- <a href="#" class="text-reset small"><i class="bi bi-heart me-2"></i>Save for later</a> -->
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- Product item END -->

								<hr> <!-- Divider -->
							<?php endforeach; ?>

						</div>

						<!-- Card footer -->
						<div class="card-footer p-0 pt-3 text-end">

							<button class="btn btn-primary mb-0">Update cart</button>
						</div>
						<?php echo form_close(); ?>
					</div>
					<!-- My Cart END -->
				</div>
				<!-- Left side END -->

				<!-- Right Side START -->
				<div class="col-lg-4">
				
					<!-- Coupon code START -->
					<div class="mb-4">
						<form action="<?= site_url('mychart') ?>" method="post">
							<h5 class="mb-2">Enter Coupon Code</h5>
							<!-- Input group -->
							<div class="input-group">
								<input type="text" name="coupon_code" class="form-control form-control" placeholder="Coupon code">
								<button type="submit" class="btn btn-dark">Apply</button>
							</div>
							<small>20% Off Discount</small>
						</form>
					</div>
					<!-- Coupon code END -->

					<!-- Order summary START -->
					<div class="card bg-light border border-secondary border-opacity-25 rounded-2 p-4">
						<!-- card header -->
						<form action="<?= site_url('add-orders') ?>" method="post">
							<div class="card-header bg-light p-0 pb-3">
								<h5 class="card-title mb-0">Order Summary</h5>
							</div>

							<!-- Card body -->
							<div class="card-body p-0 pb-3">

								<ul class="list-group list-group-borderless">
									<li class="list-group-item d-flex justify-content-between align-items-center">
										<span>Subtotal</span>
										<input type="number" name="subtotal" value="<?php echo $subtotal; ?>" hidden>
										<span class="h6 mb-0"><?php echo $subtotal; ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center">
										<span>Discount</span>
										<input type="number" name="discount" value="<?php echo $discount; ?>" hidden>
										<span class="h6 mb-0">-<?php echo $discount; ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center">
										<span>Tax 10%</span>
										<input type="number" name="tax" value="<?php echo $totalTax; ?>" hidden>
										<span class="h6 mb-0"><?php echo $totalTax; ?></span>
									</li>
								</ul>

							</div>

							<!-- Card footer -->
							<div class="card-footer bg-light border-top p-0 pt-3">
								<div class="d-flex justify-content-between align-items-center mb-3">
									<input type="number" name="total_price" value="<?php echo $totalBayar; ?>" hidden>
									<span>Payable Now</span>
									<span class="h5 mb-0"><?php echo $totalBayar; ?></span>
								</div>

								<!-- Button -->
								<div class="d-grid">
									<button type="submit" class="btn btn-primary mb-0">Checkout</button>

								</div>
							</div>
						</form>
					</div>
					<!-- Order summary END -->
					<p class="small mb-0 text-center mt-2">Sebelum melakukan Checkout harap Update Cart terlebih dahulu!</p>
				</div>
				<!-- Right Side END -->

			</div>
		</div>
	</section>
	<!-- =======================
Main END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->