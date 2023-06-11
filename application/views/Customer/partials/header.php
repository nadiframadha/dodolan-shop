<!DOCTYPE html>
<html lang="en">

<head>
	<title>Blogzine - Blog and Magazine Bootstrap 5 Theme</title>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Bootstrap based News, Magazine and Blog Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')

		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
		}

		const setTheme = function(theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
			var el = document.querySelector('.theme-icon-active');
			if (el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
					const activeThemeIcon = document.querySelector('.theme-icon-active use')
					const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
					const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

					document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
						element.classList.remove('active')
					})

					btnToActive.classList.add('active')
					activeThemeIcon.setAttribute('href', svgOfActiveBtn)
				}

				window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
					if (storedTheme !== 'light' || storedTheme !== 'dark') {
						setTheme(getPreferredTheme())
					}
				})

				showActiveTheme(getPreferredTheme())

				document.querySelectorAll('[data-bs-theme-value]')
					.forEach(toggle => {
						toggle.addEventListener('click', () => {
							const theme = toggle.getAttribute('data-bs-theme-value')
							localStorage.setItem('theme', theme)
							setTheme(theme)
							showActiveTheme(theme)
						})
					})

			}
		})
	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/font-awesome/css/all.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/vendor/tiny-slider/tiny-slider.css') ?>">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

	<!-- Offcanvas START -->
	<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasMenu">
		<!-- Offcanvas header -->
		<div class="offcanvas-header justify-content-between border-bottom px-3">
			<h3 class="mb-0">Your Cart</h3>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>

		<!-- Offcanvas body -->
		<div class="offcanvas-body d-flex flex-column px-3">
			<?php foreach ($cart as $c) : ?>
				<div class="row g-3">
					<!-- Image -->
					<div class="col-3">
						<img class="rounded-2 bg-light p-2" src="<?= base_url() ?>assets/images/shop/<?php echo $c->image; ?>" alt="avatar">
					</div>

					<div class="col-6">
						<h6 class="mb-1"><?php echo $c->item_name ?></h6>
						<div class="d-flex justify-content-between">
							<h8 class="mb-0 text-success">Rp.<?php echo $c->item_price; ?></h6>
						</div>
					</div>

					<div class="col-3">
						<a href="<?= base_url() ?>index.php/delete-item-cart/<?php echo $c->id; ?>" class="btn btn-sm btn-link">Remove</a>

					</div>
				</div>
			<?php endforeach; ?>
			<!-- Button and price -->
			<div class="mt-auto">
				<div class="d-flex justify-content-between mb-2">
					<h6 class="mb-0">Total Price :</h6>
					<h5 class="text-success mb-0"><?php echo $totalItemPrice; ?></h5>
				</div>
				<!-- Button -->
				<div class="d-grid">
					<a href="<?= site_url('mychart') ?>" class="btn btn-lg btn-primary-soft mb-0">Continue to Checkout</a>
				</div>
			</div>
		</div>
	</div>
	<!-- Offcanvas END -->