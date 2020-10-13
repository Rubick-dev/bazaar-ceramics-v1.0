function startPage(){
  var thumbImagesParent = document.querySelector('#parentImage');
  thumbImagesParent.addEventListener('click', displayImage, false);
}


function displayImage(e){
  const enlargeArray = new Array();
  enlargeArray[0] = new Image();
  enlargeArray[0].src="../../images/slideshow/enlarged/openingclay.jpg";
  enlargeArray[0].alt="Enlarged image of a person opening clay";
  enlargeArray[1] = new Image();
  enlargeArray[1].src="../../images/slideshow/enlarged/liftingclay.jpg";
  enlargeArray[1].alt="Enlarged image of a person lifting clay";
  enlargeArray[2] = new Image();
  enlargeArray[2].src="../../images/slideshow/enlarged/sequence12.jpg";
  enlargeArray[2].alt="Enlarged image of a person shaping clay";
  enlargeArray[3] = new Image();
  enlargeArray[3].src="../../images/slideshow/enlarged/finishing.jpg";
  enlargeArray[3].alt="Enlarged image of a person finishing clay";
  enlargeArray[4] = new Image();
  enlargeArray[4].src="../../images/slideshow/enlarged/finishing2.jpg";
  enlargeArray[4].alt="Enlarged image of a person fine finishing clay";
  


  if (e.target !== e.currentTarget) {
    var imageLarge = e.target.id;
 
    switch(imageLarge) {
      case "imageOne":
        document.getElementById('selectedImage').innerHTML = 
        `<img src="${enlargeArray[0].src}" alt="${enlargeArray[0].alt}" class="mainPicture fade-in">`
      break;
      
      case "imageTwo":
        document.getElementById('selectedImage').innerHTML = 
        `<img src="${enlargeArray[1].src}" alt="${enlargeArray[1].alt}" class="mainPicture fade-in">`
      break;
      
      case "imageThr":
        document.getElementById('selectedImage').innerHTML =
        `<img src="${enlargeArray[2].src}" alt="${enlargeArray[2].alt}" class="mainPicture fade-in">`
      break;
     
      case "imageFou":
        document.getElementById('selectedImage').innerHTML =
        `<img src="${enlargeArray[3].src}" alt="${enlargeArray[3].alt}" class="mainPicture fade-in">`
      break;
      
      case "imageFiv":
        document.getElementById('selectedImage').innerHTML = 
        `<img src="${enlargeArray[4].src}" alt="${enlargeArray[4].alt}" class="mainPicture fade-in">`
      break;
    }
    
  }
  e.stopPropagation;
}




