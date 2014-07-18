<?php
require_once("../inc/config.php");
require_once(ROOT_PATH . '/inc/products.php');

$products = get_products_all();

$product = check_if_product($_GET['id']);

$section = "cards";
$pageTitle = $product["name"];
include(ROOT_PATH . '/inc/header.php');
?>
    <div class="section page">
      
      <div class="wrapper">
      
        <div class="breadcrumb"><a href="/">Cards</a> &gt; <?php echo $product["name"]; ?></div>
        
        <div class="card-picture">
          <span>
            <img src="<?php echo BASE_URL . $product["img"]; ?>" alt="<?php echo $product["name"]; ?>">
          </span>
        </div>
        
        <div class="card-details">
          
          <h1><span class="price">$<?php echo $product["price"]; ?></span> <?php echo $product["name"]; ?></h1>
          
          <p class="note-designer">* All cards are designed by Sherri Nestor.</p>
          
          
          <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="<?php echo $product["paypal"]; ?>">
            <input type="hidden" name="item_name" value="<?php echo $product["name"]; ?>">
            <table>
            <tr>
              <th>
                <input type="hidden" name="on0" value="Packages">
                  <label for="os0">Package</label>
              </th>
              <td>
                <select name="os0" id="os0">
                  <?php foreach($product["packages"] as $package) { ?>
                  <option value="<?php echo $package; ?>"><?php echo $package; ?> </option>
                  <?php } ?>
                </select>
              </td>
            </tr>
            <tr>
              <th>
                <input type="hidden" name="on1" value="Quantity">
                  <label for="os1">Quantity</label>
              </th>
              <td>
                <input type="number" name="os1" id="os1" value=1>
              </td>
            </tr>
            </table>
            <input type="hidden" name="currency_code" value="USD">
            <input type="submit" value="Add to Cart" name="submit">
          </form>          
          
          
        </div>
      
      </div>
    </div>
<?php
include(ROOT_PATH . '/inc/footer.php');
?>