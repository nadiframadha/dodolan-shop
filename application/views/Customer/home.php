<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Main hero START -->
	<section class="bg-light">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Slider START -->
					<div class="tiny-slider tns-nav-line rounded-3">
						<div class="tiny-slider-inner" data-autoplay="true" data-hoverpause="true" data-arrow="false" data-dots="true" data-items="1">


							<?php foreach ($bestProducts as $p) : ?>
								<!-- Slider Item START -->
								<div>
									<div class="row g-4 align-items-center">
										<div class="col-md-6">
											<h2 class="display-5"><?php echo $p->item_name; ?></h2>
											<p><?php echo $p->description; ?></p>
											<!-- Rating star -->
											<ul class="list-inline">
												<?php if ($p->rating <= 1) : ?>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
												<?php elseif ($p->rating == 2) : ?>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
												<?php elseif ($p->rating == 3) : ?>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
												<?php elseif ($p->rating == 4) : ?>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
												<?php elseif ($p->rating == 5) : ?>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
													<li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
												<?php endif; ?>
											</ul>

											<!-- Buttons & Price -->
											<div class="hstack gap-4 align-items-center">
												<a href="<?= base_url() ?>index.php/add-to-cart/<?php echo $p->id; ?>" class="btn btn-primary mb-0"><i class="bi bi-cart2 me-2"></i>Add to cart</a>
												<h4 class="text-success mb-0">Rp.<?php echo $p->price; ?></h4>
											</div>
										</div>

										<!-- Image -->
										<div class="col-md-6">
											<img src="<?= base_url() ?>assets/images/shop/<?php echo $p->image; ?>" alt="">
										</div>
									</div>
								</div>
								<!-- Slider Item END -->
							<?php endforeach; ?>
						</div>
					</div>
					<!-- Slider END -->
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Main hero END -->

	<!-- =======================
Features END -->
	<section>
		<div class="container">
			<div class="row g-4 g-xl-5">
				<!-- Title -->
				<div class="col-sm-6 col-lg-3">
					<div class="d-flex align-items-center">
						<div class="icon-lg fs-4 text-success bg-success bg-opacity-10 rounded flex-shrink-0"> <i class="bi bi-piggy-bank"></i> </div>
						<h6 class="mb-0 ms-3">Saving Your Money to be useful</h6>
					</div>
				</div>

				<!-- Title -->
				<div class="col-sm-6 col-lg-3">
					<div class="d-flex align-items-center">
						<div class="icon-lg fs-4 text-warning bg-warning bg-opacity-15 rounded flex-shrink-0"> <i class="bi bi-truck"></i> </div>
						<h6 class="mb-0 ms-3">Fast delivery to save your time</h6>
					</div>
				</div>

				<!-- Title -->
				<div class="col-sm-6 col-lg-3">
					<div class="d-flex align-items-center">
						<div class="icon-lg fs-4 text-danger bg-danger bg-opacity-10 rounded flex-shrink-0"> <i class="bi bi-lightning-charge"></i> </div>
						<h6 class="mb-0 ms-3">You can order very quickly</h6>
					</div>
				</div>

				<!-- Title -->
				<div class="col-sm-6 col-lg-3">
					<div class="d-flex align-items-center">
						<div class="icon-lg fs-4 text-info bg-info bg-opacity-10 rounded flex-shrink-0"> <i class="bi bi-emoji-smile"></i> </div>
						<h6 class="mb-0 ms-3">Customer Satisfaction is more important</h6>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Features END -->

	<!-- =======================
Category START -->
	<section class="pt-0 pt-md-5">
		<div class="container">
			<!-- Title -->
			<div class="row">
				<div class="col-12">
					
					<!-- Title -->
					<div class="d-flex justify-content-between align-items-center mb-4">
						<h3 class="m-0">Select Categories</h3>
						<a href="#" class="text-body small"><u>View all</u></a>
					</div>
					
					<!-- Slider -->
					<div class="tiny-slider arrow-hover arrow-dark arrow-blur arrow-round">
						<div class="tiny-slider-inner" data-autoplay="false" data-hoverpause="true" data-gutter="24" data-arrow="true" data-dots="false" data-items-xl="5" data-items-lg="4" data-items-md="3" data-items-sm="2" data-items-xs="2">
							<?php foreach($categories as $c): ?>
							<!-- Category item -->
							<div>
								<div class="card bg-transparent">
									<img class="card-img" src="<?= base_url() ?>assets/images/shop/<?php echo $c->image; ?>" alt="card image">
									<div class="card-body ps-0">
										<h5 class="mb-0"><a href="<?= base_url()?>index.php/product-by-category/<?php echo $c->id; ?>" class="stretched-link"><?php echo $c->category_name; ?></a></h5>
									</div>
								</div>
							</div>
							
							<?php endforeach; ?>
						</div>
					</div> <!-- Slider END -->
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Category END -->

	<!-- =======================
Best selling product START -->
	<section class="pt-0 pt-md-5">
		<div class="container">
			<!-- Title -->
			<div class="d-sm-flex justify-content-between align-items-center mb-4">
				<h2 class="m-0">Our Best Selling Products</h2>
				<a href="#" class="text-body small"><u>View all</u></a>
			</div>

			<!-- Product START -->
			<div class="row g-4">

				<!-- Product item START -->
				<?php foreach ($bestSelling as $bs) : ?>
					<div class="col-sm-6 col-md-4 col-lg-3">
						<div class="card border p-3 h-100">
							<div class="position-relative">
								<!-- Image -->
								<a href="<?= base_url() ?>index.php/detail-product" class="position-relative z-index-9"><img class="card-img" src="<?= base_url() ?>assets/images/shop/<?php echo $bs->image; ?>" alt=""></a>
								<!-- Overlay -->
								<div class="card-img-overlay p-0">
									<span class="badge text-bg-success">New Arrival</span>
								</div>
							</div>

							<!-- Card body -->
							<div class="card-body text-center p-3 px-0">
								<!-- Badge and price -->
								<div class="d-flex justify-content-center mb-2">
									<ul class="list-inline mb-0">
										<?php if ($p->rating <= 1) : ?>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<?php elseif ($bs->rating == 2) : ?>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<?php elseif ($bs->rating == 3) : ?>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<?php elseif ($bs->rating == 4) : ?>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
										<?php elseif ($bs->rating == 5) : ?>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
											<li class="list-inline-item me-0 small"><i class="fas fa-star text-warning"></i></li>
											<li class="list-inline-item me-0 small"><i class="fas fa-star-half-alt text-warning"></i></li>
										<?php endif; ?>
									</ul>
								</div>
								<!-- Title -->
								<h5 class="card-title"><a href="<?= base_url('') ?>index.php/detail-product/<?php echo $bs->id ?>"><?php echo $bs->item_name; ?></a></h5>
								<h6 class="mb-0 text-success">Rp. <?php echo $bs->price; ?></h6>
							</div>

							<!-- Card footer -->
							<div class="card-footer text-center p-0">
								<!-- Button -->
								<a href="<?= base_url() ?>index.php/add-to-cart/<?php echo $bs->id; ?>" class="btn btn-sm btn-primary-soft mb-0"><i class="bi bi-cart me-2"></i>Add to cart</a>
							</div>
						</div>
					</div>
					<!-- Product item END -->
				<?php endforeach; ?>




			</div>
			<!-- Product END -->
		</div>
	</section>
	<!-- =======================
Best selling product END -->

	<!-- =======================
Adv START -->
	<section class="pt-0 pt-md-5">
		<div class="container">
			<!-- Adv START -->
			<div class="col-12">
				<div class="rounded-2 bg-dark-overlay-5 overflow-hidden p-4 p-md-5" style="background-image: url(<?= base_url()?>assets/images/shop/bg-offer.jpg);">
					<div class="d-md-flex justify-content-between align-items-center">
						<h4 class="text-white mb-2 mb-md-0">Save up to 20% with coupon code NAW11</h4>
						<a href="<?= site_url('mychart') ?>" class="btn btn-primary mb-0">Shop Now</a>
					</div>
				</div>
			</div>
			<!-- Adv END -->
		</div>
	</section>
	<!-- =======================
Adv END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->