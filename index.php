<?php
//echo in_array('mod_rewrite', apache_get_modules()) ? "yes":"no";
require_once("inc/config.php");
$pageTitle = "Sherri's Cards";
$section = "home";
include(ROOT_PATH . 'inc/header.php'); ?>
		<div class="section banner">

			<div class="wrapper">

				<img class="hero" src="<?php echo BASE_URL; ?>img/rotated_birthday_card.png" alt="Sherri makes cards">
				<div class="button">
					<a href="<?php echo BASE_URL; ?>cards/">
						<h2>Welcome, I&rsquo;m Sherri!</h2>
						<p>See all my cards available!</p>
					</a>
				</div>
			</div>

		</div>

		<div class="section cards latest">

			<div class="wrapper">

				<h2>Sherri&rsquo;s Latest Cards</h2>
        <?php require_once(ROOT_PATH . "inc/products.php"); ?>
				
        <?php displayProducts(4); ?>

			</div>

		</div>

<?php include(ROOT_PATH . '/inc/footer.php') ?>