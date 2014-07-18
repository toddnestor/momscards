<?php

require_once("../inc/config.php");

$search_term = "";
if(isset($_GET['s'])) {
  $search_term = trim($_GET['s']);
  if($search_term != "") {
    require_once(ROOT_PATH . "inc/products.php");
  }
}

$pageTitle = "Search";
$section = "search";
include(ROOT_PATH . "inc/header.php"); ?>

  <div class="section cards search page">
    
    <div class="wrapper">
      
      <h1>Search</h1>
      
      <form method="get" action="./">
        <input type="text" name="s" placeholder="Enter search terms here..." <?php echo $search_term != "" ? 'value="' . htmlspecialchars($search_term) . '"':""; ?>>
        <input type="submit" value="Go">
      </form>
      
      <?php if($search_term != "") displayFoundProducts($search_term); ?>
      
    </div>
    
  </div>


<?php include(ROOT_PATH . "inc/footer.php"); ?>