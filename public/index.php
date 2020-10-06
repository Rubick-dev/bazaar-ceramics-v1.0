<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bazaar Ceramics</title>
  <link rel="stylesheet" href="styles/home/layout.css">
  <link rel="stylesheet" href="styles/home/styles.css">
  <link rel="stylesheet" href="styles/home/mobile.css">
  <link rel="stylesheet" href="styles/home/tablet.css">
  <link rel="stylesheet" href="styles/home/Laptop.css">
  
</head>

<body> <!-- Beginning of Entire Page content -->
 
  <header> <!-- ### Header area containing the Logo and Navbar ### -->
      
  <nav id="navbar">
    <div id="logo">
      <a id="logoA" href="index.php"><img src="images/logo/bazaar-logo.jpg" alt="Image of Bazaar Ceramics logo" id="logoImage"><span class="titleW">Bazaar Ceramics</span></a>
    </div>

    <label for="drop" class="toggle" id='main-toggle'><span class="nav-icon"></span></label>
    <input type="checkbox" id="drop">
      
    <ul class="menu"> <!-- Start of Menu structure -->
      <li><a class="current" href="index.php">Home</a></li>
      <li><a class="" href="html/members/members.html">Members</a></li>
      
                
      <li>
        <label for="drop-1" class="toggle">About Us +</label>
        <a href="#">About Us</a>
        <input type="checkbox" id="drop-1">
        <ul>
          <li><a class="tier2" href="html/about/company_bg.html">Company Background</a></li>
          <li><a class="tier2" href="html/about/company_mission.html">Mission Statement</a></li>
          <li><a class="tier2" href="html/about/production.html">Production</a></li>
          <li><a class="tier2" href="html/about/testimonials.html">Testimonials</a></li>
        </ul>
      </li>


      <li> 
        <label for="drop-2" class="toggle">Policies +</label>
        <a href="#">Policies</a>
        <input type="checkbox" id="drop-2">
        <ul>
          <li><a class="tier2" href="html/policies/privacy.html">Privacy</a></li>
          <li><a class="tier2" href="html/policies/returns.html">Returns</a></li>
          <li><a class="tier2" href="html/policies/delivery.html">Delivery</a></li>
          <li><a class="tier2" href="html/policies/postsales.html">Post Sales</a></li>
        </ul>
      </li>


      <li><a href="html/faq/faq.html">FAQ</a></li>
     
    </ul> <!-- End of entire Menu structure -->
  </nav>  

  </header> <!-- End of Header Section (NAV)-->


<!-- ### Home Page Content Area Top Section ### -->
  <div class="container">
    <div class="grid">

      <div class="mainPicture"> <!-- Left Column content -->
        <img src="images/homepage/bazaar07.jpg" alt="Picture of Bazaar Ceramics head office and showroom building" id="homePicture" class="picture">
      </div>

      <div class="contentBottomText">
        <p class="mainPicDescription" id="mDesc">
          Bazaar Ceramics Studio has been operating for 20 years.  We started as a small collective, 
          operating in the picturesque township of Hahndorf, South Australia. We are known for our quality 
          arts and crafts.
        </p>
      </div>

      <div class="topPicText">
        <p>Regular Gallery Showings</p>
      </div>

      <div class="topPic">
        <img src="images/homepage/bazaar_gallery.jpg" alt="A picture of an art gallery showing at Bazaar Ceramics show room" id="homePictureTop" class="picture sidePicture">
      </div>
      
      <div class="bottomPicText">
        <p>Quality Domestic Art Pieces</p>
      </div>

      <div class="bottomPic">
        <img src="images/homepage/bazaar14.jpg" alt="Picture of quality domestic art pieces made by Bazaar Ceramics" id="sidePicBottom" class="picture sidePicture">
      </div>

      <div class="contentBottomEmailInstruct">
        <p id="emailInstruct">Submit your email address below to be notified of product updates, gallery shows and other special offers</p>
      </div>

      <div class="inputBox">
        <div class="input-group">
          <input type="text" class="form-control" aria-label="Sizing example input" placeholder="Name">
          <input type="text" class="form-control" aria-label="Sizing example input" placeholder="Email address">
          <input type="text" class="form-control" aria-label="Sizing example input" placeholder="Address">
        </div>
      </div>

      <div class="buttonDiv">
        <button class="btnPrimary">Submit</button>
      </div>

    </div> <!-- End of Grid container -->
  </div> <!-- End of Content Container -->
    
  <!-- ## Start of Footer Content ### -->
  <footer>
    <div class="footerDiv">
      <p>Website designed and developed by Heath Burton aka-Rubickdev</p>
    </div>
  </footer>

</body>
</html>