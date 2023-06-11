<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Main START -->
	<section>
		<div class="container">
			<div class="row g-4 g-lg-0 justify-content-between">
				<!-- Image -->
				<?php foreach ($detailProducts as $dc): ?>
					<div class="col-lg-5">
						<div class="row g-2">
							<div class="col-12">
								<div class="bg-light rounded-2 glightbox-bg p-4 position-relative">
									<a href="<?php base_url() ?>assets/images/shop/11.png" class="stretched-link cursor-zoom" data-glightbox data-gallery="image-popup">
										<img src="<?= base_url() ?>assets/images/shop/<?php echo $dc->image; ?>" alt="">
									</a>
								</div>
							</div>
							
						</div>
					</div>

					<!-- Detail -->
					<div class="col-lg-6">
						<!-- Title -->
						<h1><?php echo $dc->item_name; ?></h1>
						<p class="mb-4"><?php echo $dc->description; ?></p>

						<!-- Rating -->
						<ul class="list-inline mb-0">
							<li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
							<li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
							<li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
							<li class="list-inline-item me-0"><i class="fas fa-star text-warning"></i></li>
							<li class="list-inline-item me-0"><i class="fas fa-star-half-alt text-warning"></i></li>
							<li class="list-inline-item me-0 h6">4.5/5.0</li>
						</ul>
						<!-- List START -->
						<div class="bg-light p-3 rounded-2 mb-4">
							<div class="row g-2">
								<!-- List -->
								<div class="col-sm-6">
									<ul class="list-group list-group-borderless">
										<li class="list-group-item py-0">
											<span>Condition:</span>
											<span class="h6 mb-0">New</span>
										</li>
										<li class="list-group-item pb-0">
											<span>Category:</span>
											<span class="h6 mb-0"><a href="shop-grid.html"><?php echo $dc->id; ?></a></span>
										</li>
									</ul>
								</div>
								<!-- List -->
								<div class="col-sm-6">
									<ul class="list-group list-group-borderless">
										<li class="list-group-item py-0">
											<span>Stock:</span>
											<span class="h6 mb-0"><?php echo $dc->stock; ?></span>
										</li>
										<li class="list-group-item pb-0">
											<span>Weight:</span>
											<span class="h6 mb-0">2.2Kg</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<!-- List END -->

						

						<!-- Price and button START -->
						<div class="row">
							<!-- Price -->
							<div class="col-md-4">
								<h6 class="mb-0">Total Price</h6>
								<h4 class="text-success">Rp.<?php echo $dc->price; ?></h4>
							</div>
							<!-- Select -->
							<div class="col-md-2 pe-md-0 mb-2">
								<select class="form-select" aria-label="Default select example">
									<option value="1">01</option>
									<option value="2">02</option>
									<option value="3">03</option>
								</select>
							</div>
							<!-- Button -->
							<div class="col-md-6">
								<a href="<?= base_url() ?>index.php/add-to-cart/<?php echo $dc->id; ?>" class="btn btn-primary mb-0 w-100"><i class="bi bi-cart2 me-2"></i>Add to Cart</a>
								<p class="mb-0 mt-2 text-end small"><i class="bi bi-question-circle-fill text-primary me-2"></i>Need help? <a href="#" class="mb-0">Chat Now</a></p>
							</div>
						</div>
						<!-- Price and button END -->
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<!-- =======================
Main END -->



</main>
<!-- **************** MAIN CONTENT END **************** -->