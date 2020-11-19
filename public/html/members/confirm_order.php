<?php require_once('../../../private/initialise.php');?>
<?php require_login(); ?>
<?php $page_title = 'BC - Shopping Cart Confirmation'; ?>
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
        <table id="cartConfirmTableHeaderRow">
          <tr id="cartConfirmTableRowTR">
            <th id="td1" class="tableHeading">Product Code</th>
            <th id="td2" class="tableHeading">Description</th>
            <th id="td3" class="tableHeading">Quantity</th>
            <th id="td4" class="tableHeading">Unit Price</th>
            <th id="td5" class="tableHeading">Total Price</th>
            <th id="td6" class="tableHeading">Hidden</th>
          </tr>

        <!-- THIS IS WHERE THE TABLE IS FILLED OUT THROUGH A FUNCTION -->
        <?php 
          foreach ($getcartinfo as $value){
            echo $value;
          };
        ?>  
        </table>
      </div> <!-- End of table of cart items  -->
    </div> <!-- End of CartDiv above <table> items  -->
    
    <div id="customerInfo">
      <h2 id="ordDetHead">Order Details: </h2>
      <table id="orderConfirmTableHeaderRow">
        <tr id="orderConfirmTableRowTR">
          <th id="odtd1" class="tableHeading">Order Number</th>
          <th id="odtd2" class="tableHeading">First Name</th>
          <th id="odtd3" class="tableHeading">Last Name</th>
          <th id="odtd4" class="tableHeading">Address</th>            
          <th id="odtd5" class="tableHeading">Order Date</th>
        </tr>
        <?php 
          show_order_details($memID, $ccID);
        ?>  
      </table>
    </div> <!-- End of customer Info div -->

    <div id="confirmButtonsDiv">
      <form id="resetCartForm" action="confirm_order.php" method="post">  
        <a href="<?php echo url_for('/html/members/members.php'); ?>">
          <input class="btn" type="button" value="Keep Shopping" />
        </a>

        <a href="<?php echo url_for('/html/members/cart.php'); ?>">
          <input class="btn cancelButton" type="button" name="deleteCart" value="Return to Cart" />
        </a> 
              
        <a href="<?php echo url_for('/html/members/confirm_order.php'); ?> ">
          <input class="btn" id="orderBtn" type="submit" name="orderItems" value="PAY NOW" />
        </a>
      </form>
    </div> <!-- end of cartButtonsDiv -->
  
  </div>
  </div> <!-- end of page container section -->

<?php include(SHARED_PATH . '/login_footer.php'); ?>

   
