<?php require_once('../private/initialise.php'); ?>
<?php $page_title = 'Bazaar Ceramics'; ?>
<?php include(SHARED_PATH . '\header.php'); ?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/styles/main.css'); ?>" /> 
<?php include(SHARED_PATH . '\navmenu.php'); ?>

<!-- ### Home Page Content Area ### -->
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
  <?php include(SHARED_PATH . '\footer.php'); ?>