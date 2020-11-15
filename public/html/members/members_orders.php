<?php require_once('../../../private/initialise.php'); ?>
<?php require_login()?>

<?php

$error = '';

if (is_post_request()){

	$product_name = $_POST['prodId'];
	$cid = $_SESSION['member_id'];



	if (!find_product_by_name($product_name)) {
		echo $product_name;
		//product is out of stock message
		// Return with error message #### need to make this logic still #######
	} else {
		if ($_SESSION['cart'] === 0) {
			echo "THIS SHOWED HERE CAUSE SESSION WAS SET TO ";
			print_r($_SESSION['cart']);
			$_SESSION['cart'] = 1;

			// Due to being the first object in the cart
				//insert into orders table
				insert_new_order($cid);
				echo "NEW ORDER INSERTED INTO DB";
					// NEXT OrderID
					// CustomerID
					// OrderDate
				// insert item into OrderLine table
					// Where OrderID
					// ProductID
					// Order Quantity 
			
		} else {
			echo "THIS SHOWED HERE CAUSE SESSION WAS NOT 0. IT IS SET TO ";
			print_r($_SESSION['cart']);
			


			// Logic to add item to cart
			// Use OrderID to check if ProductID is already in the orderline Table
			// if it is - update Quantity of Ordrline table corresponding ProductID
			// else add a new OrderLine table row etnry wit hnew product ordered
			// Calculate new Cart total and store in a session value


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