<?php require_once('../../../private/initialise.php');?>
<?php require_login(); ?>

<?php
$errors = [];
// $cartItemSet = find_cart_items();

// if(!cartItemSet) {
//    Insert error message her for display on members page.
//   make a link to click and exit back to members.php page
// or force redirect_to(url_for('/html/members/members.php'));
// } 
?>

<?php $page_title = 'BC - Shopping Cart Confirmation'; ?>
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
      <h1><?php echo get_user_welcome_message() . "'s Order Confirmation" ?></h1>

      <div>
        <p>You are about to order the following products:</p>
      </div>

      <div id="cartDiv">
        <table id="cartTableHeaderRow">
          <tr id="cartTableRowTR">
            <th id="td1" class="tableHeading">Product Code</th>
            <th id="td2" class="tableHeading">Description</th>
            <th id="td3" class="tableHeading">Quantity</th>
            <th id="td4" class="tableHeading">Unit Price</th>
            <th id="td5" class="tableHeading">Total Price</th>
          </tr>

        <!-- THIS IS WHERE THE TABLE IS FILLED OUT THROUGH ORDERS TABLE CONTENT -->

          <tr>
            <td>12431223</td>
            <td>I nice Vase made out of materials that are so mamazing but what if this just went on forewver and scewe the page apart soo badly it hurts to type this much but i need to do it to test it</td>
            <td>1</td>
            <td>450</td>
            <td>450</td>
          </tr>
        
          <tr>
            <td class="tableHeading">12315232342</td>
            <td class="tableHeading">Another lorem ipsum dollor products that are amazing</td>
            <td class="tableHeading">2</td>
            <td class="tableHeading">300</td>
            <td class="tableHeading">600</td>
           </tr>

        </table>
      </div> <!-- End of table of cart items  -->

    </div> <!-- End of CartDiv above <table> items  -->
    
    <div id="customerInfo">

      <div>
        <p>Order Details: </p>
        <p>Customer name: <?php echo " INSERTNAME" ?></p>
        <p>Customer Address: <?php echo " INSERTADDRESS" ?></p>
        <p>Date of Order: <?php echo " INSERTDATE" ?></p>
        <p>Total: <?php echo " INSERTTTOTALPRICE" ?></p>
      </div>
      
    </div> <!-- End of customer Info div -->



    <div id="confirmButtonsDiv">

      <a href="<?php echo url_for('/html/members/members.php'); ?>">
        <input class="btn" type="button" value="Keep Shopping" />
      </a>

      <a href="<?php echo url_for('/html/members/cart.php'); ?>">
        <input class="btn cancelButton" type="button" name="deleteCart" value="Return to Cart" />
      </a> 
            
      <a href="<?php echo url_for('/html/members/confirm_order.php'); ?> ">
        <input class="btn" id="orderBtn" type="button" name="orderItems" value="PAY NOW" />
      </a>

    </div> <!-- end of cartButtonsDiv -->
   
  </div> <!-- end of page container section -->

<?php include(SHARED_PATH . '/login_footer.php'); ?>



