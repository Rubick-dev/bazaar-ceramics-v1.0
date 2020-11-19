<?php require_once('../../../private/initialise.php');?>
<?php require_login(); ?>
<?php

$product = $_GET['ID'];
$ccID = $_SESSION['current_cart_ID'];
if(is_post_request()){
  remove_cart_item($product, $ccID);
  if(!check_for_cart_empty($ccID)){
    delete_empty_order($ccID);
    reset_cart_session_details();
    redirect_to(url_for('/html/members/members.php'));
  }
  redirect_to(url_for('/html/members/cart.php'));
}

?>