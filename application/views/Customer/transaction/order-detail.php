<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
Main START -->
    <section class="pt-3 pt-lg-5">
        <div class="container">
            <div class="row g-4 g-lg-5">

                <!-- Left side START -->
                <div class="col-lg-12">
                    <?php if ($this->session->flashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <!-- My Cart START -->
                    <div class="card bg-transparent">
                        <!-- Card header -->
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center px-0 pb-3">
                            <h4 class="card-title mb-0">Detail Order</h4>
                            <span>Order ID : <?php echo $order_id; ?></span>
                        </div>

                        <!-- Card body -->
                        <div class="row g-4 g-lg-5">

                            <div class="col-lg-8 p-4">
                                
                                <?php foreach ($order as $c) : ?>

                                    <!-- Product item START -->
                                    <div class="row">
                                        <!-- Image -->
                                        <div class="col-5 col-md-3">

                                            <div class="bg-light p-2 rounded-2">
                                                <img src="<?= base_url() ?>assets/images/shop/<?php echo $c->image; ?>" alt="">
                                            </div>
                                        </div>

                                        <div class="col-9">
                                            <div class="row g-2">
                                                <!-- Content -->
                                                <div class="col-12">
                                                    <!-- Product detail START -->
                                                    <h5 class="mb-1"><a href="<?= base_url() ?>index.php/detail-product/<?php echo $c->item_id; ?>"><?php echo $c->item_name; ?></a></h5>
                                                    <!-- <?php if ($c->status != null) : ?>
                                                        <small class="text-success">Lunas</small>

                                                    <?php else : ?>
                                                        <small class="text-danger">segera lakukan pembayaran</small>

                                                    <?php endif; ?> -->

                                                    <small class="text-info">Detail : </small>

                                                    <!-- List -->
                                                    <ul class="nav nav-divider small align-items-center mt-1">

                                                        <li class="nav-item">Color: <?php echo $c->color; ?></li>
                                                        <li class="nav-item">item price: Rp.<?php echo $c->price; ?></li>
                                                        <li class="nav-item">Jumlah: <?php echo $c->quantity; ?></li>

                                                    </ul>
                                                    <ul class="nav nav-divider small align-items-center mt-">
                                                        <li class="nav-item">tanggal order: <?php echo $c->created_at; ?></li>

                                                    </ul>
                                                    <ul class="nav nav-divider small align-items-center mt-">

                                                        <?php if ($c->status != null) : ?>
                                                            <li class="nav-item">tanggal bayar: <?php echo $c->updated_at; ?></li>
                                                        <?php else : ?>
                                                            <li class="nav-item">tanggal bayar: </li>
                                                        <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product item END -->

                                    <hr> <!-- Divider -->

                                <?php endforeach; ?>
                            </div>
                            <!-- Right Side START -->
                            <div class="col-lg-4 p-4">


                                <!-- Order summary START -->
                                <div class="card border border-secondary border-opacity-25 rounded-2 p-4">
                                    <!-- card header -->
                                    <div class="card-header p-0 pb-3">
                                        <h5 class="card-title mb-0">Order Summary</h5>
                                    </div>

                                    <!-- Card body -->
                                    <div class="card-body p-0 pb-3">
                                        <ul class="list-group list-group-borderless">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>Subtotal</span>
                                                <span class="h6 mb-0">Rp. <?php echo $costDetail->subtotal; ?></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>Discount</span>
                                                <span class="h6 mb-0">- Rp. <?php echo $costDetail->discount; ?></span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>Tax 10%</span>
                                                <span class="h6 mb-0">Rp. <?php echo $costDetail->tax; ?></span>
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Card footer -->
                                    <div class="card-footer border-top p-0 pt-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span>Total Cost</span>
                                            <span class="h5 mb-0">Rp. <?php echo $costDetail->total_cost; ?></span>
                                        </div>
                                    </div>

                                    <div class="card-footer border-top p-0 pt-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="h5 mb-0 text-success">LUNAS BROOOOO!!!!!</span>
                                        </div>
                                    </div>
                                    <!-- Order summary END -->
                                </div>
                                <!-- Right Side END -->
                            </div>

                        </div>
                        <!-- My Cart END -->

                        <!-- Left side END -->

                    </div>
                </div>
    </section>
    <!-- =======================
Main END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->