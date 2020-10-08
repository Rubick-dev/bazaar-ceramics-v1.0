<?php require_once('../../../private/initialise.php'); ?>
<?php $page_title = 'Bazaar Ceramics - Members'; ?>

<!-- Start of page content -->
<?php include(SHARED_PATH . '\header.php'); ?>
<link rel="stylesheet" href="../../styles/main.css"> 
<script src="../../scripts/formScripts.js"></script>
<?php include(SHARED_PATH . '\navmenu.php'); ?>


<!-- ################################################################## -->
<!-- ### Members Page Content Area Top Section ### -->
<div class="container3">
			
	<div>
		<img class="banner" src="../../images/members/banner.jpg" alt="Banner of Bazaar Ceramics">
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
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.html?name=Red%20Bowl&slice=bcpot002&price=135&description=An%20elegant%20red%20bowl%20used%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot002_smaller.jpg" alt="picture of a Red Bowl"></a>
						<figcaption>Red Bowl - $135</figcaption>
					</figure>
				</td>

				<td>
					<figure>
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.html?name=Red%20Vase&slice=bcpot003&price=175&description=An%20elegant%20red%20vase%20used%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot003_smaller.jpg" alt="picture of a Red Vase"></a>
						<figcaption>Red Vase - $175</figcaption>
					</figure>
				</td>

				<td>
					<figure>
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.html?name=Blue%20Bowl&slice=bcpot006&price=145&description=An%20elegant%20blue%20bowl%20used%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot006_smaller.jpg" alt="picture of Blue Bowl"></a>
						<figcaption>Blue Bowl - $145</figcaption>
					</figure>
				</td>

			</tr>
			<tr>

				<td>
					<figure>
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.html?name=Blue%20Cup%20and%20Saucer&slice=bcpot008&price=245&description=An%20elegant%20blue%20cup%20and%20saucer%20used%20mainly%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot008_smaller.jpg" alt="picture of a Blue Cup and Saucer"></a>
						<figcaption>Blue Cup and Saucer - $245</figcaption>
					</figure>
				</td>

				<td>
					<figure>
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.html?name=White%20Bowl&slice=bcpot009&price=345&description=An%20elegant%20white%20bowl%20used%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot009_smaller.jpg" alt="picture of a White Vase"></a>
						<figcaption>White Bowl - $345</figcaption>
					</figure>
				</td>

				<td>
					<figure>
						<a onclick = "windowChecker = openMembersOrderWindow('members_orders.html?name=Brown%20Vase&slice=bcpot016&price=645&description=An%20elegant%20Brown%20Vase%20used%20for%20decorative%20purposes');"><img class="imageMembersPage" src="../../images/members/bcpot016_smaller.jpg" alt="picture of a Brown Vase"></a>
						<figcaption>Brown Vase - $645</figcaption>
					</figure>
				</td>

			</tr>
		</table>

	</div> <!-- End of contentArea Div -->

</div> <!-- End of container Div-->

    
  <!-- ## Start of Footer Content ### -->
  <?php include(SHARED_PATH . '\footer.php'); ?>