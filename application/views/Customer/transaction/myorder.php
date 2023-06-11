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
                        <?php echo form_open('customer/cart/update', 'class="mt-4"'); ?>
                        <!-- Card header -->
                        <div class="card-header border-bottom d-flex justify-content-between align-items-center px-0 pb-3">
                            <h4 class="card-title mb-0">My Order</h4>
                            <span>Total Order : <?php echo $jmlhOrder; ?></span>
                        </div>

                        <!-- Card body -->
                        <div class="card-body p-0 pt-4">
                        <?php 
                        $prevOrderId = null; // Variabel sementara untuk menyimpan order_id sebelumnya

                        foreach ($order as $c): 
                            if ($c->id != $prevOrderId) 
                            {
                                // Hanya menampilkan item jika order_id berbeda dengan order_id sebelumnya
                                ?>
                                <!-- Product item START -->
                                <div class="row">
                                    <!-- Image -->
                                    <div class="col-5 col-md-2">
                                        <!-- Check box -->
                                        <div>

                                            <small>order id: <small class="text-info"><?php echo $c->id; ?></small> </small>
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
                                                <?php if ($c->status != null) : ?>
                                                    <small class="text-success">lunas</small>

                                                <?php else : ?>
                                                    <small class="text-danger">segera lakukan pembayaran</small>

                                                <?php endif; ?>
                                                <!-- List -->
                                                <ul class="nav nav-divider small align-items-center mt-1">

                                                    <li class="nav-item">Color: <?php echo $c->color; ?></li>
                                                    <li class="nav-item">item price: Rp.<?php echo $c->price; ?></li>
                                                    <li class="nav-item">Jumlah: <?php echo $c->quantity; ?></li>
                                                    <li class="nav-item">tanggal order: <?php echo $c->created_at; ?></li>

                                                </ul>
                                                <ul class="nav nav-divider small align-items-center mt-">
                                                    <?php if ($c->status != null) : ?>
                                                        <li class="nav-item">tanggal bayar: <?php echo $c->updated_at; ?></li>
                                                    <?php else : ?>
                                                        <li class="nav-item">tanggal bayar: </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>

                                            <!-- Select -->
                                            <div class="col-md-2">
                                                <!-- <span>tanggal order : <?php echo $c->created_at; ?></span> -->


                                            </div>

                                            <!-- Price and button -->
                                            <div class="col-md-3 text-md-end">
                                                <h5>Rp.<?php echo $c->total_cost; ?></h5>
                                                <!-- Buttons -->
                                                <div class="hstack gap-1 flex-wrap text-primary-hover mt-2 justify-content-md-end">
                                                    <a href="<?= base_url() ?>index.php/order-detail/<?php echo $c->id; ?>" class="text-reset small"><i class="bi bi-eye me-2"></i>order detail</a>
                                                    <!-- <a href="#" class="text-reset small"><i class="bi bi-heart me-2"></i>Save for later</a> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product item END -->

                                <hr> <!-- Divider -->

                                <?php
                            }

                            // Set prevOrderId dengan order_id saat ini
                            $prevOrderId = $c->id;
                            endforeach;
                            ?>

                        </div>


                        <?php echo form_close(); ?>
                    </div>
                    <!-- My Cart END -->
                </div>
                <!-- Left side END -->



            </div>
        </div>
    </section>
    <!-- =======================
Main END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->