<aside class="col-xl-4 col-xxl-3">
    <!-- Responsive offcanvas body START -->
    <div class="offcanvas-xl offcanvas-end" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
        <div class="offcanvas-header bg-light">
            <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Advance Filter</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasSidebar" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body flex-column p-3 p-xl-0">
            <form id="searchProduct" class="border rounded-2" action="<?= site_url('filter-product') ?>" method="post">
                <!-- Availability START -->
                <div class="card card-body">
                    <!-- Title -->
                    <h6 class="mb-3">Availability</h6>

                    <!-- Availability group -->
                    <div class="form-check">
                        <input class="form-check-input" name="stock_only" type="radio" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            All
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="stock_only" id="flexRadioDefault2" value="1">
                        <label class="form-check-label" for="flexRadioDefault2">
                            On Stock Only
                        </label>
                    </div>
                </div>
                <!-- Availability END -->

                <hr class="my-0"> <!-- Divider -->



                <hr class="my-0"> <!-- Divider -->

                <!-- Brands START -->
                <div class="card card-body">
                    <!-- Title -->
                    <h6 class="mb-2">Category</h6>
                    <!-- Amenities group -->
                    <div class="col-12">
                        <?php foreach ($category as $c) : ?>
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" name="kategori_id[]" type="checkbox" value="<?php echo $c->id; ?>" id="amenitiesType11">
                                <label class="form-check-label" for="amenitiesType11"><?php echo $c->category_name; ?></label>
                            </div>
                        <?php endforeach; ?>


                        
                    </div>
                </div>
                <!-- Brands END -->

                <hr class="my-0"> <!-- Divider -->

                <!-- Rating Star START -->
                <div class="card card-body">
                    <!-- Title -->
                    <h6 class="mb-2">Rating Star</h6>
                    <!-- Rating Star group -->
                    <ul class="list-inline mb-0 g-3">
                        <!-- Item -->
                        <li class="list-inline-item mb-0">
                            <input name="rating[]" type="checkbox" class="btn-check" id="btn-check-6" value="1">
                            <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-6">1<i class="bi bi-star-fill"></i></label>
                        </li>
                        <!-- Item -->
                        <li class="list-inline-item mb-0">
                            <input name="rating[]" type="checkbox" class="btn-check" id="btn-check-7" value="2">
                            <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-7">2<i class="bi bi-star-fill"></i></label>
                        </li>
                        <!-- Item -->
                        <li class="list-inline-item mb-0">
                            <input name="rating[]" type="checkbox" class="btn-check" id="btn-check-8" value="3">
                            <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-8">3<i class="bi bi-star-fill"></i></label>
                        </li>
                        <!-- Item -->
                        <li class="list-inline-item mb-0">
                            <input name="rating[]" type="checkbox" class="btn-check" id="btn-check-15" value="4">
                            <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-15">4<i class="bi bi-star-fill"></i></label>
                        </li>
                        <!-- Item -->
                        <li class="list-inline-item mb-0">
                            <input name="rating[]" type="checkbox" class="btn-check" id="btn-check-16" value="5">
                            <label class="btn btn-sm btn-light btn-primary-soft-check" for="btn-check-16">5<i class="bi bi-star-fill"></i></label>
                        </li>
                    </ul>
                </div>
                <!-- Rating Star END -->
            </form><!-- Form End -->
        </div>
        <!-- Buttons -->
        <div class="d-flex justify-content-between p-2 p-xl-0 mt-xl-3">
            <button id="clearBtn" class="btn btn-link p-0 mb-0">Clear all</button>
            <button form="searchProduct" type="submit" class="btn btn-primary mb-0">Filter Result</button>
        </div>
    </div>
    <!-- Responsive offcanvas body END -->
</aside>