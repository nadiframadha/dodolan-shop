<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Main START -->
	<section class="pt-3 pt-lg-5">
		<div class="container">
			<div class="row">
				<!-- Title -->
				<div class="mb-4">
					<h2 class="m-0">Searched Products</h2>
				</div>

				<!-- Filter START -->
				<?php $this->load->view('Customer/partials/filter-search.php'); ?>
				<!-- Filter END -->

				<!-- Main part START -->
				<div class="col-xl-9">

					

					<!-- Product START -->
					<div class="row g-4">

						<!-- Adv START -->
						<div class="col-12">
							<div class="rounded-2 bg-dark-overlay-5 overflow-hidden p-4 p-md-5" style="background-image: url(<?= base_url() ?>assets/images/shop/bg-offer.jpg);">
								<div class="d-md-flex justify-content-between align-items-center">
									<h4 class="text-white mb-2 mb-md-0">Save up to 20% with coupon code NAW11</h4>
									<a href="<?= site_url('mychart') ?>" class="btn btn-primary mb-0">Shop Now</a>
								</div>
							</div>
						</div>
						<!-- Adv END -->



						<?php foreach ($products as $p) : ?>
							<!-- Product item START -->
							<div class="col-sm-6 col-md-4">
								<div class="card border p-3 h-100">
									<!-- Image -->
									<a href="<?= base_url('') ?>index.php/detail-product/<?php echo $p->id ?>"><img class="card-img" src="<?= base_url() ?>assets/images/shop/<?php echo $p->image; ?>" alt=""></a>

									<!-- Card body -->
									<div class="card-body text-center p-3 px-0">
										<!-- Badge and price -->
										<div class="d-flex justify-content-center mb-2">
											<ul class="list-inline mb-0">
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
										</div>
										<!-- Title -->
										<h5 class="card-title"><a href="<?= base_url('') ?>index.php/detail-product/<?php echo $p->id ?>"><?php echo $p->item_name; ?></a></h5>
										<h6 class="mb-0 text-success">Rp.<?php echo $p->price; ?></h6>
									</div>

									<!-- Card footer -->
									<div class="card-footer text-center p-0">
										<!-- Button -->
										<a href="<?= base_url() ?>index.php/add-to-cart/<?php echo $p->id; ?>" class="btn btn-sm btn-primary-soft mb-0"><i class="bi bi-cart me-2"></i>Add to cart</a>
									</div>
								</div>
							</div>
							<!-- Product item END -->

						<?php endforeach; ?>

						<!-- Pagination START -->
						<!-- <div class="col-12">
						<nav class="d-flex justify-content-center" aria-label="navigation">
							<ul class="pagination pagination-bordered justify-content-center d-inline-block d-lg-flex">
								<li class="page-item">
									<a class="page-link" href="#">First</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">1</a></li>
								<li class="page-item active"><a class="page-link" href="#">2</a></li>
								<li class="page-item disabled"><a class="page-link" href="#">..</a></li>
								<li class="page-item"><a class="page-link" href="#">22</a></li>
								<li class="page-item"><a class="page-link" href="#">23</a></li>
								<li class="page-item">
									<a class="page-link" href="#">Last</a>
								</li>
							</ul>
						</nav>
					</div> -->
						<!-- Pagination END -->
					</div>
					<!-- Product END -->

				</div>
				<!-- Main part END -->
			</div>
		</div>
	</section>
	<!-- =======================
Main END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->