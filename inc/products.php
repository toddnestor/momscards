<?php

$products = array();
$products[101] = array(
	"name" => "Logo Shirt, Red",
	"img" => "img/shirts/shirt-101.jpg",
	"price" => 18,
  "sizes" => array("Small","Medium","Large","X-Large"),
  "paypal" => "UKGYLKJDNSBNQ"
);
$products[102] = array(
	"name" => "Mike the Frog Shirt, Black",
    "img" => "img/shirts/shirt-102.jpg",
    "price" => 18,
    "sizes" => array("Small","Medium","Large","X-Large"),
  "paypal" => "UKGYLKJDNSBNQ"
);
$products[103] = array(
    "name" => "Mike the Frog Shirt, Blue",
    "img" => "img/shirts/shirt-103.jpg",    
    "price" => 18,
    "sizes" => array("Small","Medium","Large","X-Large"),
  "paypal" => "UKGYLKJDNSBNQ"
);
$products[104] = array(
    "name" => "Logo Shirt, Green",
    "img" => "img/shirts/shirt-104.jpg",    
    "price" => 18,
    "sizes" => array("Small","Medium","Large","X-Large"),
  "paypal" => "UKGYLKJDNSBNQ"
);
$products[105] = array(
    "name" => "Mike the Frog Shirt, Yellow",
    "img" => "img/shirts/shirt-105.jpg",    
    "price" => 18,
    "sizes" => array("Small","Medium","Large","X-Large"),
  "paypal" => "UKGYLKJDNSBNQ"
);
$products[106] = array(
    "name" => "Logo Shirt, Gray",
    "img" => "img/shirts/shirt-106.jpg",    
    "price" => 18,
    "sizes" => array("Small","Medium","Large","X-Large"),
  "paypal" => "UKGYLKJDNSBNQ"
);
$products[107] = array(
    "name" => "Logo Shirt, Turquoise",
    "img" => "img/shirts/shirt-107.jpg",    
    "price" => 18,
    "sizes" => array("Small","Medium","Large","X-Large"),
  "paypal" => "UKGYLKJDNSBNQ"
);
$products[108] = array(
    "name" => "Logo Shirt, Orange",
    "img" => "img/shirts/shirt-108.jpg",    
    "price" => 18,
    "sizes" => array("Large","X-Large"),
  "paypal" => "UKGYLKJDNSBNQ"
);

function displayProducts($products=array(), $count=0, $echo=1) {
  $string = "";
  $string .= '<ul class="products">';
  array_reverse($products);
  $products = $count ? array_slice($products,0,$count):$products;
  foreach($products as $product_id => $product) {
    $string .= '<li>';
    $string .= '<a href="shirt.php?id=' . $product_id . '">';
    $string .= '<img src="' . $product["img"] . '" alt="' . $product["name"] . '">';
		$string .= '<p>View Details</p>';
    $string .= '</a>';
    $string .= '</li>';
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

?>