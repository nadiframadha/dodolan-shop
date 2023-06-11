<!-- **************** MAIN CONTENT START **************** -->
<main>
  <!-- =======================
  Inner intro START -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 col-xl-6 mx-auto">
          <div class="bg-primary bg-opacity-10 rounded p-4 p-sm-5">
            <h2>Create your free account</h2>
            <!-- Form START -->
            <?php echo form_open('auth/register/process_registration', 'class="mt-4"'); ?>
            <!-- Name -->
            <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="Username" value="<?php echo set_value('name'); ?>">
                <small id="name" class="form-text text-danger"><?php echo form_error('name'); ?></small>
              </div>
              <!-- Email -->
              <div class="mb-3">
                <label class="form-label" for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="E-mail" value="<?php echo set_value('email'); ?>">
                <small id="emailHelp" class="form-text text-danger"><?php echo form_error('email'); ?></small>
              </div>
              <!-- Password -->
              <div class="mb-3">
                <label class="form-label" for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="*********">
                <small class="form-text text-danger"><?php echo form_error('password'); ?></small>
              </div>
              <!-- Confirm Password -->
              <div class="mb-3">
                <label class="form-label" for="exampleInputPassword2">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword2" name="confirm_password" placeholder="*********">
                <small class="form-text text-danger"><?php echo form_error('confirm_password'); ?></small>
              </div>
              
              <!-- Button -->
              <div class="row align-items-center">
                <div class="col-sm-4">
                  <button type="submit" class="btn btn-success">Sign me up</button>
                </div>
                <div class="col-sm-8 text-sm-end">
                  <span>Have an account? <a href="<?php echo base_url()?>index.php/login"><u>Sign in</u></a></span>
                </div>
              </div>
            <?php echo form_close(); ?>
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