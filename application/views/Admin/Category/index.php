<!-- **************** MAIN CONTENT START **************** -->
<main>

	<!-- =======================
Main contain START -->
	<section class="py-4">
		<div class="container">
			<div class="row g-4">



				<div class="col-12">
					<!-- Blog list table START -->
					<div class="card border bg-transparent rounded-3">
						<!-- Card header START -->
						<div class="card-header bg-transparent border-bottom p-3">
							<div class="d-sm-flex justify-content-between align-items-center">
								<h5 class="mb-2 mb-sm-0">Category list <span class="badge bg-primary bg-opacity-10 text-primary"><?php echo $jumlahCategory; ?></span></h5>
								<a href="<?= base_url() ?>index.php/admin-create-category" class="btn btn-sm btn-primary mb-0">Add New</a>
							</div>
						</div>
						<!-- Card header END -->

						<!-- Card body START -->
						<div class="card-body">

							<!-- Search and select START -->
							<div class="row g-3 align-items-center justify-content-between mb-3">
								<!-- Search -->
								<div class="col-md-8">
									<form class="rounded position-relative">
										<input class="form-control pe-5 bg-transparent" type="search" placeholder="Search" aria-label="Search">
										<button class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
									</form>
								</div>

								<!-- Select option -->
								<div class="col-md-3">
									<!-- Short by filter -->
									<form>
										<select class="form-select z-index-9 bg-transparent" aria-label=".form-select-sm">
											<option value="">Sort by</option>
											<option>Free</option>
											<option>Newest</option>
											<option>Oldest</option>
										</select>
									</form>
								</div>
							</div>
							<!-- Search and select END -->

							<!-- Blog list table START -->
							<div class="table-responsive border-0">
								<table class="table align-middle p-4 mb-0 table-hover table-shrink">
									<!-- Table head -->
									<thead class="table-dark">
										<tr>
											<th scope="col" class="border-0 rounded-start">No</th>

											<th scope="col" class="border-0">Category Name</th>
											<th scope="col" class="border-0">Category Image</th>

											<th scope="col" class="border-0 rounded-end">Action</th>
										</tr>
									</thead>

									<!-- Table body START -->
									<tbody class="border-top-0">
										<?php foreach ($category as $c): ?>
										<!-- Table item -->
										<tr>
											<!-- Table data -->
											<td>
												<a href="#" class="badge text-bg-success mb-2"><i class="fas fa-circle me-2 small fw-bold"></i><?php echo $c->id ?></a>
											</td>
											<!-- Table data -->
											<td>
												<a href="#" class="badge text-bg-info mb-2"><i class="fas fa-circle me-2 small fw-bold"></i><?php echo $c->category_name ?></a>
											</td>
											<td>
												<div class="col-5 col-md-2">
													<div class="course-title mt-2 mt-md-0 mb-0 bg-light p-2 rounded-2">
														<img src="<?= base_url() ?>assets/images/shop/<?php echo $c->image; ?>" alt="">
													</div>
												</div>
											
											</td>

											<!-- Table data -->
											<td>
												<div class="d-flex gap-2">
													<a href="<?= base_url() ?>index.php/admin-delete-category/<?php echo $c->id; ?>" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="bi bi-trash"></i></a>
													<a href="<?= base_url() ?>index.php/admin-edit-category/<?php echo $c->id; ?>" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
												</div>
											</td>
										</tr>

										<?php endforeach; ?>

									</tbody>
									<!-- Table body END -->
								</table>
							</div>
							<!-- Blog list table END -->

							<!-- Pagination START -->
							<div class="d-sm-flex justify-content-sm-between align-items-sm-center mt-4 mt-sm-3">
								<!-- Content -->
								<p class="mb-sm-0 text-center text-sm-start">Showing 1 to 8 of 20 entries</p>
								<!-- Pagination -->
								<nav class="mb-sm-0 d-flex justify-content-center" aria-label="navigation">
									<ul class="pagination pagination-sm pagination-bordered mb-0">
										<li class="page-item disabled">
											<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Prev</a>
										</li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item active"><a class="page-link" href="#">2</a></li>
										<li class="page-item disabled"><a class="page-link" href="#">..</a></li>
										<li class="page-item"><a class="page-link" href="#">15</a></li>
										<li class="page-item">
											<a class="page-link" href="#">Next</a>
										</li>
									</ul>
								</nav>
							</div>
							<!-- Pagination END -->
						</div>
					</div>
					<!-- Blog list table END -->
				</div>
			</div>
		</div>
	</section>
	<!-- =======================
Main contain END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->