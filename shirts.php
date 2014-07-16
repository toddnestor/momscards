<?php
include("inc/products.php");
$pageTitle = "Mike's Full Catalog of Shirts";
$section = "shirts";
include('inc/header.php'); ?>

		<div class="section shirts page">

			<div class="wrapper">

				<h1>Mike&rsquo;s Full Catalog of Shirts</h1>

				<?php displayProducts($products); ?>

			</div>

		</div>

<?php include('inc/footer.php') ?>