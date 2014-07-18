<?php

require_once("config.php");

function card_thumbnail_listing($sku, $img, $name) {
	$string = "";
	$string .= '<li>';
	$string .= '<a href=" ' . BASE_URL . 'cards/' . $sku . '/">';
	$string .= '<img src="' . BASE_URL . $img . '" alt="' . $name . '">';
	$string .= '<p>View Details</p>';
	$string .= '</a>';
	$string .= '</li>';
	
	return $string;
}

function get_recent_products($products,$count=0) {
	$recent = array_reverse($products,true);
  $recent = $count ? array_slice($recent,0,$count,true):$recent;
	
	return $recent;
}

function get_products_search($search_term) {
	$results = array();
	$all_products = get_products_all();
	$count = 0;
	foreach($all_products as $product) {
		if(stripos($product["name"],$search_term) !== false) {
			$results[$count] = $product;
		} elseif (stripos($search_term," ") !== false) {
			$search_terms = explode(" ",$search_term);
			foreach($search_terms as $s) {
				if(stripos($product["name"],$s) !== false) {
					$results[$count] = $product;
				}
			}
		}
		$count++;
	}
	
	return $results;
}

function displayFoundProducts($search_term="", $count=0, $echo=1) {
	$products = get_products_search($search_term);
	
	if(count($products) > 0) {
		$string = "<h2>Your search results</h2>" . displayProducts($count, 0, $products);;
		echo $echo ? $string:"";
	} else {
		$string = "<p>No products were found matching that search term.</p>";
		echo $echo ? $string:"";
	}
	
	return $echo ? true:$string;
}

function displayProducts($count=0, $echo=1, $products=0, $start=0, $amount=0) {
  $all_products = $products ? $products:get_products_all();
	$string = "";
  $string .= '<ul class="products">';
	$products = get_products_subset(get_recent_products($all_products,$count),$start,$amount);
  foreach($products as $product) {
    $string .= card_thumbnail_listing($product["sku"], $product["img"], $product["name"]);
  }
    $string .= '</ul>';
  if($echo) {
    echo $string;
    return true;
  }
  else
  {
    return $string;
  }
}

function display_product_pagination($total_pages, $current_page, $echo=1) {
$string = "";
for($i=1;$i<=$total_pages;$i++) {
		if($current_page == $i) {
			$string .= "<span> " . $i . " </span> ";
		} else {
			$string .= '<a href="./?pg=' . $i . '"> ' . $i . ' </a> ';
		}
	}
	
	echo $echo ? $string:"";
	return $echo ? true:$string;
}

function check_if_product($product_id) {
	$products = get_products_all();
	if (isset($products[$product_id]))
	{
		$product = $products[$product_id];
	}
	else
	{
		header("Location: " . BASE_URL . "cards/");
		exit();
	}
	
	return $product;
}

function get_products_count($products=0) {
	$all_products = $products ? $products:get_products_all();
	return count($all_products);
}

function get_products_subset($products=0, $start=0,$amount=0) {
	$products = $products ? $products:get_products_all();
	
	if($start && $amount) {
		return array_slice($products, $start-1, $amount);
	} else {
		return $products;
	}
}

function get_products_all() {
	$products = array();
	$products[101] = array(
    	"name" => "Birthday Card, General",
    	"img" => "img/cards/card-101.jpg",
    	"price" => 5,
    	"paypal" => "UKGYLKJDNSBNQ",
      "packages" => array("Single Card","Five Pack","Ten Pack","Twenty Pack")
    );
    $products[102] = array(
    	"name" => "New Baby Card, Boy",
        "img" => "img/cards/card-102.jpg",
        "price" => 5,
        "paypal" => "UKGYLKJDNSBNQ",
        "packages" => array("Single Card","Five Pack","Ten Pack","Twenty Pack")
    );
		$products[103] = array(
    	"name" => "Anniversary Card, Sophisticated",
        "img" => "img/cards/card-103.jpg",
        "price" => 5,
        "paypal" => "UKGYLKJDNSBNQ",
        "packages" => array("Single Card","Five Pack","Ten Pack","Twenty Pack")
    );
	
	foreach ($products as $product_id => $product) {
		$products[$product_id]["sku"] = $product_id;
	}
	return $products;
}
?>