<?php require_once('../../../private/initialise.php'); ?>
<?php $page_title = 'BC - Production'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/styles/main.css'); ?>" /> 
<script src="../../scripts/slideshow.js"></script>
<?php include(SHARED_PATH . '/navmenu.php'); ?>

<!-- #### START OF CONTENT #### -->
<div onload="startPage();">
  <h1 class="prodH1">Production Process Information</h1>
</div>

<div class="container4"> <!--  ## Company Production Process content Start Area ## -->

  <div class="prodRow" id="parentImage">
    <div class="prodCol tnImageDiv">
      <img class="tnImage" src="../../images/slideshow/thumbs/openingclaysmall.jpg" alt="Thumbnail image of Opening Clay" id="imageOne">
      <div class="prodImgDesc">
        Opening Clay
      </div>
    </div>
  
    <div class="prodCol tnImageDiv">
      <img class="tnImage" src="../../images/slideshow/thumbs/liftingclaysmall.jpg" alt="Thumbnail image of lifting Clay" id="imageTwo">
      <div class="prodImgDesc">
        Lifting Clay
      </div>
    </div>

    <div class="prodCol tnImageDiv">
      <img class="tnImage" src="../../images/slideshow/thumbs/sequence12small.jpg" alt="Thumbnail image of shaping Clay" id="imageThr">
      <div class="prodImgDesc">
        Shaping Clay
      </div>
    </div>

    <div class="prodCol tnImageDiv">
      <img class="tnImage" src="../../images/slideshow/thumbs/finishing2small.jpg" alt="Thumbnail image of finishing Clay" id="imageFou">
      <div class="prodImgDesc">
        Finishing Clay
      </div>
    </div>

    <div class="prodCol tnImageDiv">
      <img class="tnImage" src="../../images/slideshow/thumbs/finishingsmall.jpg" alt="Thumbnail image of fine finishing Clay" id="imageFiv">
      <div class="prodImgDesc">
        Fine Finishing Clay
      </div>
    </div>
  </div> <!-- Closing Row Div encasing the 5 Thumbnail images-->

  <div class="displayImage" id="selectedImage">
    <img src="../../images/slideshow/enlarged/openingclay.jpg" alt="Enlarged image of user selected thumbnail" class="mainPicture fade-in">
  </div>


<div class="prodTextInfo">
  <div>
    <p class="prodTopText fade-in">
      Bazaar Ceramics are constantly experimenting with new designs and techniques. 
      The process of developing a particular range of ceramics, starts with the design process. 
      The ceramic designers and gallery director meet regularly to discuss new ideas for 
      product ranges. It may be that the designers are following through on an inspiration from 
      a field trip or perhaps the gallery director has some suggestions to make based on 
      feedback from customers.
    </p>
  </div>

  <hr class="seperator fade-in">

  <div class="imgandtext">
    <div class="prodResult fade-in">
      <img class="prodResultImg" src="../../images/slideshow/prodresult.jpg" alt="image of some recently completed vases">
    </div>

    <div class="prodBottomTextDiv">
      <p class="prodBottomText fade-in">
        Promising designs are developed into working drawings which the production potters use 
        to create the ceramic forms.  Depending on the type of decoration, the designers may 
        apply the decoration at this stage, or after they have been “bisqued” (fired to 1000 
        degrees celsius). These prototype designs go through a lengthy development stage of 
        testing and review until the designer is happy with the finished product.  At this 
        stage a limited number of pots are produced and displayed in the gallery.  If they do 
        well in the gallery, they become a “standard line”. 
      </p>
    </div>

  </div> 
</div> <!-- End of ProdTextInfo Div-->

<br><br><br><br><br>

</div> <!-- ### End of Container2 and section info ###-->

<!-- ## Start of Footer Content ### -->
<?php include(SHARED_PATH . '/footer.php'); ?>