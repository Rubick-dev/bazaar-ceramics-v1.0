<?php require_once('../../../private/initialise.php'); ?>
<?php require_login(); ?>
<?php $page_title = 'Bazaar Ceramics - Members'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<link rel="stylesheet" href="../../styles/main.css"> 
<script src="../../scripts/formScripts.js"></script>
<?php include(SHARED_PATH . '/navmenu.php'); ?>

<?php 
// Logic to get the total number of orders and set to a variable for display
$current_cart = $_SESSION['current_cart_ID'];
if ($current_cart === 0) {
	$carttotal = 0;
} else {
$carttotal = get_cart_total();
}
?>

<div class="container3">
	<div class="banner">
		<div class="bannerImgDiv"> 
			<img class="bannerImg" src="../../images/members/banner.jpg" alt="Banner of Bazaar Ceramics">
		</div>

		<div class="shopCartDiv">
		
			<a href="<?php echo url_for('/html/members/cart.php'); ?>" class="shopCartIconAnchor">
				<img class="shopCartIconImg" src="../../images/members/shopCartIcon.jpg" alt="The Shopping Cart Icon">
			</a>
			<div class="cartItemTotal"><?php echo $carttotal ?></div>
		</div>

	</div> <!-- ###    End of Banner Div    ### -->

	<div class="pageHeading">
		<h2>Bazaar Ceramics – Members</h2>
	</div> <!-- End of Headign Div-->


	<div class="subHeading">
			<h3>Members Pricing</h3>
	</div>  <!-- End of Subheading Div -->

	<div class="contentArea">
		<table>
			<thead>
				<tr>
					<td></td>
					<td class="thead">
						<h5 class="discItemsHead">Discounted Items</h5>
					</td>
					<td></td>
				</tr>
			</thead>
			<tr>

				<td>
					<figure>
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.php?name=Copper%20Red%20Dish&slice=bcpot002&price=450&description=An%20elegant%20red%20bowl%20used%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot002_smaller.jpg" alt="picture of a Red Bowl"></a>
						<figcaption>Copper Red Dish - $450</figcaption>
					</figure>
				</td>

				<td>
					<figure>
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.php?name=Copper%20Red%20Vase&slice=bcpot003&price=870&description=An%20elegant%20red%20vase%20used%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot003_smaller.jpg" alt="picture of a Red Vase"></a>
						<figcaption>Copper Red Vase - $870</figcaption>
					</figure>
				</td>

				<td>
					<figure>
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.php?name=Cyan%20Dish&slice=bcpot006&price=950&description=An%20elegant%20blue%20bowl%20used%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot006_smaller.jpg" alt="picture of Blue Bowl"></a>
						<figcaption>Cyan Dish - $950</figcaption>
					</figure>
				</td>

			</tr>
			<tr>

				<td>
					<figure>
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.php?name=Light%20Blue%20Cup%20Set&slice=bcpot008&price=245&description=An%20elegant%20blue%20cup%20and%20saucer%20used%20mainly%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot008_smaller.jpg" alt="picture of a Blue Cup and Saucer"></a>
						<figcaption>Light Blue Cup Set - $106</figcaption>
					</figure>
				</td>

				<td>
					<figure>
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.php?name=Tungsten%20Blue%20Dish&slice=bcpot009&price=345&description=An%20elegant%20white%20bowl%20used%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot009_smaller.jpg" alt="picture of a White Vase"></a>
						<figcaption>Tungsten Blue Dish - $399</figcaption>
					</figure>
				</td>

				<td>
					<figure>
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.php?name=Earthen%20Vase&slice=bcpot016&price=999&description=An%20elegant%20Brown%20Vase%20used%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot016_smaller.jpg" alt="picture of a Brown Vase"></a>
						<figcaption>Earthen Vase - $999</figcaption>
					</figure>
				</td>

			</tr>
		</table>

	</div> <!-- End of contentArea Div -->

</div> <!-- End of container Div-->

    
  <!-- ## Start of Footer Content ### -->
  <?php include(SHARED_PATH . '/footer.php'); ?>