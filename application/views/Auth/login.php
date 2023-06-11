<!-- **************** MAIN CONTENT START **************** -->
<main>

    <!-- =======================
Inner intro START -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
                    <div class="p-4 p-sm-5 bg-primary bg-opacity-10 rounded">
                        <h2>Log in to your account</h2>
                        <!-- Form START -->
                        <form class="mt-4" method="POST" action="<?= base_url() ?>index.php/auth/login/process_login">
                            <!-- Email -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="E-mail">
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label class="form-label" for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="*********">
                            </div>
                            <!-- Checkbox -->
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">keep me signed in</label>
                            </div>
                            <!-- Button -->
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-success">Sign me in</button>
                                </div>
                                <div class="col-sm-8 text-sm-end">
                                    <span>Don't have an account? <a href="<?= base_url() ?>index.php/register"><u>Sign up</u></a></span>
                                </div>
                            </div>
                        </form>
                        <!-- Form END -->

                        <hr>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
Inner intro END -->

</main>
<!-- **************** MAIN CONTENT END **************** -->