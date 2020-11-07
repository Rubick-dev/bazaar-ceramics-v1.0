</head>
<body> <!-- Beginning of Entire Page content -->
 
  <header> <!-- ### Header area containing the Logo and Navbar ### -->
      
  <nav id="navbar">
    <div id="logo">
      <a id="logoA" href="<?php echo url_for('/index.php'); ?>">
      <img alt="Image of Bazaar Ceramics logo" id="logoImage" 
      src="<?php echo url_for('/images/logo/bazaar-logo.jpg'); ?>" />             
      <span class="titleW">Bazaar Ceramics</span></a>
    </div>

    <label for="drop" class="toggle" id='main-toggle'><span class="nav-icon"></span></label>
    <input type="checkbox" id="drop">
      
    <ul class="menu"> <!-- Start of Menu structure -->
      <li><a class="homeMenu" href="<?php echo url_for('/index.php'); ?>" >Home</a></li>
      <li><a class="membersMenu" href="<?php echo url_for('/html/members/members.php'); ?>">Members</a></li>
      
                
      <li>
        <label for="drop-1" class="toggle">About Us +</label>
        <a class="aboutTopMenu" href="#">About Us</a>
        <input type="checkbox" id="drop-1">
        <ul>
          <li><a class="tier2 aboutBackgroundMenu" href="<?php echo url_for('/html/about/company_bg.php'); ?>">Company Background</a></li>
          <li><a class="tier2 aboutMissionMenu" href="<?php echo url_for('/html/about/company_mission.php'); ?>">Mission Statement</a></li>
          <li><a class="tier2 aboutProductionMenu" href="<?php echo url_for('/html/about/production.php'); ?>">Production</a></li>
          <li><a class="tier2 aboutTestimonialsMenu" href="<?php echo url_for('/html/about/testimonials.php'); ?>">Testimonials</a></li>
        </ul>
      </li>


      <li> 
        <label for="drop-2" class="toggle">Policies +</label>
        <a class="policiesTopMenu" href="#">Policies</a>
        <input type="checkbox" id="drop-2">
        <ul>
          <li><a class="tier2 policiesPrivacyMenu" href="<?php echo url_for('/html/policies/privacy.php'); ?>">Privacy</a></li>
          <li><a class="tier2 policiesReturnsMenu" href="<?php echo url_for('/html/policies/returns.php'); ?>">Returns</a></li>
          <li><a class="tier2 policiesDeliveriesMenu" href="<?php echo url_for('/html/policies/delivery.php'); ?>">Delivery</a></li>
          <li><a class="tier2 policiesPostSalesMenu" href="<?php echo url_for('/html/policies/postsales.php'); ?>">Post Sales</a></li>
        </ul>
      </li>


      <li><a class="faqMenu" href="<?php echo url_for('/html/faq/faq.php'); ?>">FAQ</a></li>

      
      <li> 
        <label for="drop-3" class="toggle">Account +</label>
        <a class="loginMenu" href="#">Account</a>
        <input type="checkbox" id="drop-3">
        <ul>
        <?php 
    if(is_logged_in()){
      echo "<li><a class='tier2 accountLogoutMenu' href='"?><?php echo url_for('/html/login/logout.php'); ?><?php echo "'>Logout</a></li>";
    } else {
      echo "<li><a class='tier2 accountLoginMenu' href='" ?><?php echo url_for('/html/login/login.php?reg=0&req=0'); ?><?php echo "'>Login</a></li>";
      echo "<li><a class='tier2 accountRegisterMenu' href='"?><?php echo url_for('/html/login/register_exist.php'); ?><?php echo "'>Register</a></li>";
    }
  ?>
          
        </ul>
      </li>


    </ul> <!-- End of entire Menu structure -->

  </nav>  
  <?php 
    if(is_logged_in()){
      echo (display_welcome_message());
    } else {
      // Do nothing!
    }
  ?>

  </header> <!-- End of Header Section - NAV -->