<?php require_once('../../../private/initialise.php');?>
<?php require_login(); ?>
<?php $page_title = 'BC - Shopping Cart'; ?>
<?php include(SHARED_PATH . '/header.php'); 
$errors = [];
$UsrID = $_SESSION['username'];
$memID = $_SESSION['member_id'];
$ccID = $_SESSION['current_cart_ID'];
$getcartinfo = show_cart($ccID);
$total = $_SESSION['cart_total'];

if(is_post_request()){
  reset_cart();
}

?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/styles/styles3.css'); ?>" />
</head>

<body>
  <div id="container4">
    <div class="logo">
    <a id="logoA" href="<?php echo url_for('/index.php'); ?>">
      <img alt="Image of Bazaar Ceramics logo" id="logoImage" 
      src="<?php echo url_for('/images/logo/bazaar-logo.jpg'); ?>" /></a>  
    </div> <!-- Close logo -->

    <div class="cartSection">
      <h1><?php echo get_user_welcome_message() . "'s Shopping Cart" ?></h1>
    

<?php
if ($ccID === 0){
  echo "\n\n";
  echo display_empty_cart_msg();
  ?>
      <div id="cartActions">
        <a href="<?php echo url_for('/html/members/members.php'); ?>">
          <input class="btn" type="button" value="Return to Members" />
        </a>        
      </div><!-- end of cart actions div -->

    </div> <!-- end of cartSection -->
  </div> <!-- end of page container section -->

<?php
  } else { 
?>
      <div id="cartDiv">
        <table id="cartTableHeaderRow">
          <tr id="cartTableRowTR">
            <th id="td1" class="tableHeading">Product Code</th>
            <th id="td2" class="tableHeading">Description</th>
            <th id="td3" class="tableHeading">Quantity</th>
            <th id="td4" class="tableHeading">Unit Price</th>
            <th id="td5" class="tableHeading">Total Price</th>
            <th id="td6" class="tableHeading">Cancel Item</th>
          </tr>
        <!-- THIS IS WHERE THE TABLE IS FILLED OUT THROUGH ORDERS TABLE CONTENT -->
          <?php 
          foreach ($getcartinfo as $value){
            echo $value;
          };
          ?>     
        </table><!-- End of table of cart items  -->
      </div> <!-- End of CartDiv above <table> items  -->
    
      <div id="totalPriceDiv">
        <p>Total Order Price:   <?php echo "$" . $total; ?></p> 
      </div>

      <div id="cartActions">
        <form id="resetCartForm" action="cart.php" method="post">
        <a href="<?php echo url_for('/html/members/members.php'); ?>">
          <input class="btn" type="button" value="Return to Members" />
        </a>

        <a href="<?php echo url_for('/html/members/clear_orders.php'); ?>">
          <input class="btn cancelButton" type="submit" name="deleteCart" value="Remove All Items from Shopping Cart" />
        </a> 
              
        <a href="<?php echo url_for('/html/members/confirm_order.php'); ?> ">
          <input class="btn" id="orderBtn" type="button" name="orderItems" value="ORDER ITEMS" />
        </a>
        </form>
      </div> <!-- end of cartSection -->

    </div><!-- end of cart actions div -->
  </div> <!-- end of page container section -->
 

<?php 
  } 
?>

<?php include(SHARED_PATH . '/login_footer.php'); ?>
