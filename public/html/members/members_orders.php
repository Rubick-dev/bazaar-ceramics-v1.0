<?php require_once('../../../private/initialise.php'); ?>
<?php require_login()?>

<?php

$error = '';

if (is_post_request()){

	$product_name = $_POST['prodId'];
	$cid = $_SESSION['member_id'];
	$order_quantity = $_POST['quantity'];

	// Checks to see if the product is in stock.
	if (!find_product_by_name($product_name)) {
		// Return to members page with error message
		echo "<script>alert('We are very sorry this product is no longer available');</script>";
		echo "<script>window.close(); window.opener.location.reload();</script>";	
		
	// If the product is in stock runs the add to cart logic following.
	} else {
		if ($_SESSION['cart'] === 0) {
			$_SESSION['cart'] = 1;
			insert_new_order($cid);
			$_SESSION['current_cart_ID'] = get_new_order_OrderID();
			$currentCartID = $_SESSION['current_cart_ID'];
			insert_new_orderline($currentCartID, $product_name, $order_quantity);
			echo "<script>window.close(); window.opener.location.reload();</script>";			
		} else {
			// When a cart previously existed prior to user adding to cart
			$ccid = $_SESSION['current_cart_ID'];
			if(!has_product_been_ordered($ccid, $product_name)){
				insert_new_orderline($ccid, $product_name, $order_quantity);
				echo "<script>window.close(); window.opener.location.reload();</script>";
			} else {
				// When the current ordered line item is already in the cart
				echo $product_name;
				$updated_quantity = $order_quantity + get_new_quantity_value($product_name, $ccid);
				update_orderline($ccid, $product_name, $updated_quantity); 
				echo "<script>window.close(); window.opener.location.reload();</script>";
			}
		}
	}
} 

?>

<!DOCTYPE html>
<html lang="en"> 

<head>
	<meta charset="utf-8">
	<meta name="description" content="Bazaar ceramics is a major ceramics producer and seller offering unique and local products">
	<meta name="keywords" content="ceramics,pottery,clay,bazaar ceramics,gallery">
	<meta name="author" content="Heath Burton">
	<title>BC – Member Order</title>
	<link rel="stylesheet" type="text/css" href="../../styles/styles2.css">
	<script src="../../scripts/imagePreload.js"></script>
	<script src="../../scripts/formScripts.js"></script>
</head>

<body onload="bodyInfoUpdate();">

	<div class="container">
		<header class="pageHeading">
			<h1 id="itemsName" >Item Name Placeholder</h1>
		</header>
		
		<div class="imageContent">
			<table id="imageSlices" cellspacing="0" cellpadding="0">
			</table>
		</div>
		
		<div class="formContent">
			
			<h3 id="itemsName2">Order Item - ######</h3>

			<div class="formDetailsContent">
				<form id="form" action="#" method="post" onsubmit="return submitForm();">
					<ul class="wrapper">
						<li class="form-row" id="descInsert"></li>
						<li class="form-row">
							<label for="quantity">Quantity:</label>
							<input type="text" name="quantity" value="1" id="quantity">
						</li>
						<li class="form-row" id="priceInsert"></li>
						<li class="form-row">
							<label for="totalPrice">Total Price</label>
							<input type="text" name="totalPrice" id="totalPrice">
						</li>
						<li class="form-row" id="productId5"></li>
						<div class="buttonDiv">
							<button class="butn" id="clrButn" onclick="clearValues(); return false">Clear</button>
							<button class="butn" id="calcTotal" onclick="sum(); return false">Calculate Total</button>
							<button class="butn" type="submit" value="submit" id="submitButton" name="submitButton">Add to Cart</button>
						</div> <!-- End of button div -->
					</ul>
				</form>
			</div> <!-- End of Form Details div-->
		</div> <!-- End of all Form Content div -->

		<footer class="footer">
			<p id="footer"> &copy; Copyright | About Us | Legal Info </p>
			<button id="closePage" onclick="window.close()">Close Page</button>
			<?php db_disconnect($db); ?>
		</footer>
	
	</div>
</body>
</html>