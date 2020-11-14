<?php require_once('../../../private/initialise.php'); ?>
<?php require_login()?>
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
				<form id="form" action="#" method="post" onsubmit="submitForm(); return false;">
					<ul class="wrapper">
						<li class="form-row" id="descInsert">
							<!-- <label for="itemDescription">Item Description</label>
							<input type="text" name="itemDescription" id="iDesc" value="Placeholder data only" size="40" readonly> -->
						</li>
						<li class="form-row">
							<label for="quantity">Quantity:</label>
							<input type="text" name="quantity" value="1" id="quantity">
						</li>
						<li class="form-row" id="priceInsert">
							<!-- <label for="price">Price:</label>
							<input type="text" name="price" id="price" value="" size="3" maxlength="5" readonly> -->
						</li>
						<li class="form-row">
							<label for="totalPrice">Total Price</label>
							<input type="text" name="totalPrice" id="totalPrice">
						</li>
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