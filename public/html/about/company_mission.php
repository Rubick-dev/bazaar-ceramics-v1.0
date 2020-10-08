<?php require_once('../../../private/initialise.php'); ?>
<?php $page_title = 'BC - Company Mission'; ?>
<?php include(SHARED_PATH . '\header.php'); ?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/styles/main.css'); ?>" /> 
<?php include(SHARED_PATH . '\navmenu.php'); ?>
<!DOCTYPE html>
<html lang="en">


  <div class="container">

    <div class="companyMissionInfoContainer">
      <h2>Mission</h2>
      <p>Bazaar Ceramics is committed to producing unique, evocative contemporary Ceramic Art of the highest technical quality.</p> 
      <p>Our Goals:</p>
      <ol>
        <li>To produce unique hand crafted pieces for the individual and corporate collector</li>
        <li>To showcase the best of Australian Ceramic Art and Design</li>
        <li>To provide an extensive range of well crafted and designed domestic ware</li>
        <li>To showcase technical excellence in ceramic technology</li>
      </ol>
    </div> 


  </div> <!-- End of the Middle container-->

<!-- ## Start of Footer Content ### -->
<?php include(SHARED_PATH . '\footer.php'); ?>




<!-- SAVING FOR SAFE KEEPS
<body> 
 
  <header>
      
  <nav id="navbar">
    <div id="logo">
      <a id="logoA" href="../../index.html"><img src="../../images/homepage/bazaar-logo.jpg" alt="Image of Bazaar Ceramics logo" id="logoImage"><span class="titleW">Bazaar Ceramics</span></a>
    </div>

    <label for="drop" class="toggle" id='main-toggle'><span class="nav-icon"></span></label>
    <input type="checkbox" id="drop">
      
    <ul class="menu"> 
      <li><a class="" href="../../index.html">Home</a></li>
      <li><a class="" href="../members/members.html">Members</a></li>
      
      <li>
        <label for="drop-1" class="toggle current" id="current">About Us +</label>
        <a class="current" href="#">About Us</a>
        <input type="checkbox" id="drop-1">
        <ul>
          <li><a class="tier2" href="company_bg.html">Company Background</a></li>
          <li><a class="tier2 current" href="company_mission.html">Mission Statement</a></li>
          <li><a class="tier2" href="production.html">Production</a></li>
          <li><a class="tier2" href="testimonials.html">Testimonials</a></li>
        </ul>
      </li>

      <li> 
        <label for="drop-2" class="toggle">Policies +</label>
        <a href="#">Policies</a>
        <input type="checkbox" id="drop-2">
        <ul>
          <li><a class="tier2" href="../policies/privacy.html">Privacy</a></li>
          <li><a class="tier2" href="../policies/returns.html">Returns</a></li>
          <li><a class="tier2" href="../policies/delivery.html">Delivery</a></li>
          <li><a class="tier2" href="../policies/postsales.html">Post Sales</a></li>
        </ul>
      </li>

      <li><a href="../faq/faq.html">FAQ</a></li>
      
    </ul> 
  </nav>  

  </header>  -->