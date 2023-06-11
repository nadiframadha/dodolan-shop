<!-- =======================
Footer START -->
<footer class="bg-dark pt-5">
	<div class="container">
		<!-- About and Newsletter START -->
		<!-- <div class="row pt-3 pb-4">
			<div class="col-md-3">
				<img src="<?= base_url('assets/images/logo-footer.svg')?>" alt="footer logo">
			</div>
			<div class="col-md-5">
				<p class="text-muted">The next-generation blog, news, and magazine theme for you to start sharing your stories today! This Bootstrap 5 based theme is ideal for all types of sites that deliver the news.</p>
			</div>
			<div class="col-md-4">
				< Form -->
				<!-- <form class="row row-cols-lg-auto g-2 align-items-center justify-content-end">
					<div class="col-12">
						<input type="email" class="form-control" placeholder="Enter your email address">
					</div>
					<div class="col-12">
						<button type="submit" class="btn btn-primary m-0">Subscribe</button>
					</div>
					<div class="form-text mt-2">By subscribing you agree to our 
						<a href="#" class="text-decoration-underline text-reset">Privacy Policy</a>
					</div>
				</form>
			</div> -->
		<!-- </div> -->
		<!-- About and Newsletter END -->

		<!-- Divider -->


	<!-- Footer copyright START -->
	<div class="bg-dark-overlay-3 mt-5">
		<div class="container">
			<div class="row align-items-center justify-content-md-between py-4">
				<div class="col-md-6">
					<!-- Copyright -->
					<div class="text-center text-md-start text-primary-hover text-muted">©2023 <a href="https://www.instagram.com/wivk_me/" class="text-reset btn-link" target="_blank">Web Programming III</a>. Kelompok VI
					</div>
				</div>
				<div class="col-md-6 d-sm-flex align-items-center justify-content-center justify-content-md-end">
					<!-- Language switcher -->
					<!-- <div class="dropup me-0 me-sm-3 mt-3 mt-md-0 text-center text-sm-end">
						<a class="dropdown-toggle text-primary-hover" href="#" role="button" id="languageSwitcher" data-bs-toggle="dropdown" aria-expanded="false">
							English Edition
						</a>
						<ul class="dropdown-menu min-w-auto" aria-labelledby="languageSwitcher">
							<li><a class="dropdown-item" href="#">English</a></li>
							<li><a class="dropdown-item" href="#">German </a></li>
							<li><a class="dropdown-item" href="#">French</a></li>
						</ul>
					</div> -->
					<!-- Links -->
					<ul class="nav text-primary-hover text-center text-sm-end justify-content-center justify-content-center mt-3 mt-md-0">
						<li class="nav-item"><a class="nav-link" href="https://www.instagram.com/wivk_me/">Uti Akhmad Nawawi</a></li>
						<li class="nav-item"><a class="nav-link" href="#">Nadif Ramadha</a></li>
						<li class="nav-item"><a class="nav-link pe-0" href="#">Fadhli Firmasnyah</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer copyright END -->
</footer>
<!-- =======================
Footer END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="<?= base_url('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Vendors -->
<script src="<?= base_url('assets/vendor/tiny-slider/tiny-slider.js') ?>"></script>

<!-- Template Functions -->
<script src="<?= base_url('assets/js/functions.js') ?>"></script>
<script>
    function updateForm() {
        document.getElementById('updateForm').submit();
    }

    function toggleCheckbox(checkbox) {
        checkbox.checked ? checkbox.value = checkbox.id : checkbox.value = '';
        updateForm();
    }

	// Ambil referensi tombol "Clear all"
    var clearBtn = document.getElementById('clearBtn');

    // Tambahkan event listener untuk menghandle klik tombol "Clear all"
    clearBtn.addEventListener('click', function() {
        // Dapatkan referensi elemen formulir yang ingin direset
        var form = document.getElementById('searchProduct');

        // Reset nilai-nilai pada elemen formulir
        form.reset();
    });
</script>


</body>
</html>