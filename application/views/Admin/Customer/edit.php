<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Main contain START -->
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h2">Edit Customer</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <?php echo form_open('admin/customer/update', 'class="mt-4"'); ?>

                            <!-- Main form -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Post name -->
                                    <div class="mb-3">
                                        <input type="text" name="customer_id" hidden value="<?php echo $customer->id ?>">
                                        <label for="name" class="form-label">Name</label>
                                        <input required id="con-name" name="name" type="text" class="form-control"
                                            value="<?php echo $customer->name; ?>">

                                        <label for="email" class="form-label">Email</label>
                                        <input required id="con-name" name="email" type="text" class="form-control"
                                            value="<?php echo $customer->email; ?>">

                                        <label for="phone" class="form-label">Phone</label>
                                        <input required id="con-name" name="phone" type="number" class="form-control"
                                            value="<?php echo $customer->phone; ?>">

                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input required id="con-name" name="alamat" type="text" min="1" max="100"
                                            class="form-control" value="<?php echo $customer->alamat; ?>">

                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                        <input required id="con-name" name="deskripsi" type="text" class="form-control"
                                            value="<?php echo $customer->deskripsi; ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <!-- Image -->
                                        <div class="position-relative">
                                            <h6 class="my-2">Image<a href="#!"
                                                    class="text-primary"> Browse</a></h6>
                                            <label for="image" class="w-100" style="cursor:pointer;">
                                                <span>
                                                    <input class="form-control stretched-link" type="file"
                                                        name="image" id="image"
                                                        accept="image/gif, image/jpeg, image/png">
                                                </span>
                                            </label>
                                        </div>
                                        <!-- <p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG and PNG. Our suggested
                                            dimensions are 600px * 450px. Larger image will be cropped to 4:3 to fit our
                                            thumbnails/previews.</p> -->
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check mb-3">
                                        <label class="form-check-label" for="postCheck">
                                            Batalkan perubahan?
                                        </label>
                                        <a href="<?= base_url()?>index.php/admin-customer">Kembali</a>
                                    </div>
                                </div>
                                
                                <!-- Create post button -->
                                <div class="col-md-12 text-start">
                                    <button class="btn btn-primary w-100" type="submit">Update Customer</button>
                                </div>
                            </div>
                            </form>
                            <!-- Form END -->
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                    <!-- Chart END -->
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
    Main contain END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->

