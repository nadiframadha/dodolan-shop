<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
    Main contain START -->
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h2">Edit Product</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <?php echo form_open('admin/product/update', 'class="mt-4"'); ?>

                            <!-- Main form -->
                            <div class="row">
                                <div class="col-12">
                                    <!-- Post name -->
                                    <div class="mb-3">
                                        <input type="text" name="product_id" hidden value="<?php echo $product->id ?>">
                                        <label for="name" class="form-label">Name Product</label>
                                        <input required id="con-name" name="name" type="text" class="form-control"
                                            value="<?php echo $product->item_name; ?>">

                                        <label for="description" class="form-label">Description</label>
                                        <input required id="con-name" name="description" type="text" class="form-control"
                                            value="<?php echo $product->description; ?>">

                                        <label for="price" class="form-label">Price</label>
                                        <input required id="con-name" name="price" type="number" class="form-control"
                                            value="<?php echo $product->price; ?>">

                                        <label for="stock" class="form-label">Stock</label>
                                        <input required id="con-name" name="stock" type="number" min="0" max="100"
                                            class="form-control" value="<?php echo $product->stock; ?>">

                                        <label for="color" class="form-label">Color</label>
                                        <input required id="con-name" name="color" type="text" class="form-control"
                                            value="<?php echo $product->color; ?>">
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
                                                    <input value="<?php echo $product->image; ?>" class="form-control stretched-link" type="file"
                                                        name="image" id="image"
                                                        accept="image/gif, image/jpeg, image/png"><?php echo $product->image; ?>
                                                </span>
                                            </label>
                                        </div>
                                        <!-- <p class="small mb-0 mt-2"><b>Note:</b> Only JPG, JPEG and PNG. Our suggested
                                            dimensions are 600px * 450px. Larger image will be cropped to 4:3 to fit our
                                            thumbnails/previews.</p> -->
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <!-- Message -->
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select name="category" class="form-select" aria-label="Default select example">
                                            <option selected disabled>Select category</option>
                                            <?php foreach ($categories as $category): ?>
                                            <option value="<?php echo $category->id; ?>"
                                                <?php echo ($category->id == $product->category_id) ? 'selected' : ''; ?>>
                                                <?php echo $category->category_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <!-- Message -->
                                    <div class="mb-3">
                                        <label class="form-label">Rating</label>
                                        <select name="rating" class="form-select" aria-label="Default select example">
                                            
                                            <option value="1" <?php echo ($product->rating == 1) ? 'selected' : ''; ?>>Bintang 1</option>
                                            <option value="2" <?php echo ($product->rating == 2) ? 'selected' : ''; ?>>Bintang 2</option>
                                            <option value="3" <?php echo ($product->rating == 3) ? 'selected' : ''; ?>>Bintang 3</option>
                                            <option value="4" <?php echo ($product->rating == 4) ? 'selected' : ''; ?>>Bintang 4</option>
                                            <option value="5" <?php echo ($product->rating == 5) ? 'selected' : ''; ?>>Bintang 5</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <!-- Message -->
                                    <div class="mb-3">
                                        <label class="form-label">jadikan Best Selling</label>
                                        <select name="best_selling" class="form-select" aria-label="Default select example">
                                            
                                            <option value="1" <?php echo ($product->best_selling == 1) ? 'selected' : ''; ?>>YA</option>
                                            <option value="2" <?php echo ($product->best_selling == 2) ? 'selected' : ''; ?>>Tidak</option>
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <!-- Message -->
                                    <div class="mb-3">
                                        <label class="form-label">Jadikan Produk Unggulan</label>
                                        <select name="produk_unggulan" class="form-select" aria-label="Default select example">
                                            <option selected @disabled(true)>Pilih</option>
                                            
                                            <option value="1" <?php echo ($product->produk_unggulan == 1) ? 'selected' : ''; ?>>YA</option>
                                            <option value="2" <?php echo ($product->produk_unggulan == 2) ? 'selected' : ''; ?>>Tidak</option>
                                            
                                            
                                        </select>
                                    </div>
                                </div>
                               <div class="col-12">
                                    <div class="form-check mb-3">
                                        <label class="form-check-label" for="postCheck">
                                            Batalkan perubahan?
                                        </label>
                                        <a href="<?= base_url()?>index.php/admin-product">Kembali</a>
                                    </div>
                                </div>
                                <!-- Create post button -->
                                <div class="col-md-12 text-start">
                                    <button class="btn btn-primary w-100" type="submit">Update Product</button>
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

