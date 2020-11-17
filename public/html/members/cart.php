<?php require_once('../../../private/initialise.php');?>
<?php require_login(); ?>

<?php
$errors = [];
$memID = $_SESSION['member_id']; //= $member['CustomerID'];
$UserID = $_SESSION['username']; //= $member['UserID'];
$ccID = $_SESSION['current_cart_ID']; //= '';

if($_SESSION['cart'] === 0){
  // echo "<script>alert('no items in cart - Please order items to see cart')</script>";
  // redirect_to(url_for('/html/members/members.php'));
};
// $cartItemSet = find_cart_{items();

// if(!cartItemSet) {
//    Insert error message her for display on members page.
//   make a link to click and exit back to members.php page
// or force redirect_to(url_for('/html/members/members.php'));
// } 
?>

<?php $page_title = 'BC - Shopping Cart'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/styles/styles3.css'); ?>" />
</head>

<!-- Start if page content layout after page display logic is completed. -->
<body>
  <div id="container4">
    <div class="logo">
    <a id="logoA" href="<?php echo url_for('/index.php'); ?>">
      <img alt="Image of Bazaar Ceramics logo" id="logoImage" 
      src="<?php echo url_for('/images/logo/bazaar-logo.jpg'); ?>" /></a>  
    </div>

    <div class="cartSection">
      <h1><?php echo get_user_welcome_message() . "'s Shopping Cart" ?></h1>

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
          //show_cart();
          ?>  
          <tr>
            <td>12431223</td>
            <td>I nice Vase made out of materials that are so mamazing but what if this just went on forewver and scewe the page apart soo badly it hurts to type this much but i need to do it to test it</td>
            <td>1</td>
            <td>450</td>
            <td>450</td>
            <td><img src=<?php echo url_for('/images/members/cancel_order.png'); ?> class="cancelImg"></img></td>
          </tr>
        
          <tr>
            <td class="tableHeading">12315232342</td>
            <td class="tableHeading">Another lorem ipsum dollor products that are amazing</td>
            <td class="tableHeading">2</td>
            <td class="tableHeading">300</td>
            <td class="tableHeading">600</td>
            <td><img src=<?php echo url_for('/images/members/cancel_order.png'); ?> class="cancelImg"></img></td>
          </tr>
        </table>
      </div> <!-- End of table of cart items  -->
      
    </div> <!-- End of CartDiv above <table> items  -->
    <div id="totalPriceDiv">
      <p>Total Order Price:   <?php echo "$" . 5 ?></p> 
    </div>
     
    <div id="cartActions">
      
      <a href="<?php echo url_for('/html/members/members.php'); ?>">
        <input class="btn" type="button" value="Return to Members" />
      </a>

      <a href="<?php echo url_for('/html/members/clear_orders.php'); ?>">
        <input class="btn cancelButton" type="button" name="deleteCart" value="Remove ALL Items from Cart" />
      </a> 
            
      <a href="<?php echo url_for('/html/members/confirm_order.php'); ?> ">
        <input class="btn" id="orderBtn" type="button" name="orderItems" value="ORDER ITEMS" />
      </a>

    </div><!-- end of cart actions div -->

  </div> <!-- end of page container section -->

<?php include(SHARED_PATH . '/login_footer.php'); ?>



