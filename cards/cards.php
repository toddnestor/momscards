<?php
require_once("../inc/config.php");
require_once(ROOT_PATH . "/inc/products.php");


//get the current page number, set it to 1 if it is invalid or nonexistent
$current_page = !empty($_GET['pg']) && intval($_GET['pg']) ? $_GET['pg']:1;

$total_products = get_products_count();

$products_per_page = 8;

$total_pages = ceil($total_products / $products_per_page);

//redirect if current page is nonexistent (i.e. too large or small a number)
if($current_page > $total_pages) {
	header("Location: ./?pg=" . $total_pages);
} elseif($current_page < 1) {
	header("Location: ./?pg=1");
}

// calculate the starting item for this page,
// the end item is automatically calculated based
// on the number of products per page

$start = (($current_page - 1) * $products_per_page + 1);

$pageTitle = "Mike's Full Catalog of Cards";
$section = "cards";
include(ROOT_PATH . '/inc/header.php'); ?>

		<div class="section cards page">

			<div class="wrapper">

				<h1>Full Catalog of Cards</h1>
				
				<div class="pagination">
					<?php display_product_pagination($total_pages, $current_page); ?>
				</div>
				
				<?php displayProducts(0,1,0,$start,$products_per_page); ?>

				<div class="pagination">
					<?php display_product_pagination($total_pages, $current_page); ?>
				</div>
				
			</div>

		</div>

<?php include(ROOT_PATH . '/inc/footer.php') ?>