<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Main START -->
	<section class="pt-3 pt-lg-5">
		<div class="container">
			<div class="row g-4 g-lg-5">

				<!-- Left side START -->
				<div class="col-lg-8">
					<div class="vstack gap-3">
						
						<!-- Your Order START -->
						<div class="card bg-transparent">
								<form  id="cart_id" action="<?= site_url('place-order') ?>" method="post">
								<!-- Card header -->
								<div class="card-header px-0 pb-3">
									<h4 class="card-title mb-0">Your Order</h4>
								</div>

								<!-- Card body -->
								<div class="card-body p-0">
									<!-- Product item START -->
									<?php foreach ($order as $c) : ?>

										<!-- Product item START -->
										<div class="bg-light px-4 py-2 rounded-2 mb-3">
											<div class="row align-items-center">
												<!-- Product detail -->
												<div class="col-md-9">
													<div class="d-sm-flex align-items-center">
														<div class="d-flex align-items-center mb-2 mb-sm-2">
															
															<!-- Image -->
															<img src="<?= base_url() ?>assets/images/shop/<?php echo $c->image; ?>" class="w-90" alt="">
														</div>
														<!-- Title and list -->
														<div>
															<h5 class="mb-1"><a href="<?= base_url()?>index.php/detail-product/<?php echo $c->item_id; ?>"><?php echo $c->item_name; ?></a></h5>
															<ul class="nav nav-divider small align-items-center">
																<li class="nav-item">Gender: Male</li>
																<li class="nav-item">Color: <?php echo $c->color; ?></li>
																<li class="nav-item">Size: One size</li>
															</ul>
														</div>
													</div>
												</div>

												<!-- Button -->
												<div class="col-md-3 text-end">
													<a href="<?= base_url()?>index.php/detail-product/<?php echo $c->item_id; ?>" class="btn btn-link mb-0">View Product</a>
												</div>
											</div>
										</div>
									<?php endforeach; ?>


								</div>
								</form>

							</div>
							<!-- Your Order END -->

							<hr> <!-- Divider -->							

						</div>
					</div>
					<!-- Left side END -->

					<!-- Right Side START -->
					<div class="col-lg-4">


						<!-- Order summary START -->
						<div class="card bg-light border border-secondary border-opacity-25 rounded-2 p-4">
							<!-- card header -->
							<div class="card-header bg-light p-0 pb-3">
								<h5 class="card-title mb-0">Order Summary</h5>
							</div>
							
							<!-- Card body -->
							<div class="card-body p-0 pb-3">
								<ul class="list-group list-group-borderless">
									<li class="list-group-item d-flex justify-content-between align-items-center">
										<span>Subtotal</span>
										<span class="h6 mb-0">Rp. <?php echo $subtotal; ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center">
										<span>Discount</span>
										<span class="h6 mb-0">- Rp. <?php echo $discount; ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center">
										<span>Tax 10%</span>
										<span class="h6 mb-0">Rp. <?php echo $totalTax; ?></span>
									</li>
								</ul>
							</div>

							<!-- Card footer -->
							<div class="card-footer bg-light border-top p-0 pt-3">
								<div class="d-flex justify-content-between align-items-center mb-3">
									<span>Payable Now</span>
									<span class="h5 mb-0">Rp. <?php echo $totalBayar; ?></span>
								</div>

								<!-- Button -->
								
								<div class="d-grid"><button type="submit" form="cart_id" class="btn btn-primary mb-0">Place Order</button></div>
							</div>
						</div>
						<!-- Order summary END -->
						<p class="small mb-0 text-center mt-2">By completing your purchase, you agree to these <a href="#">Terms of Service</a></p>
					</div>
					<!-- Right Side END -->

			</div>
		</div>
	</section>
	<!-- =======================
Main END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->