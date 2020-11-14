/* Collecting the queryString data passed over from the previous page item click
and storing the data into variables. */
const bazaarCeramicsString = window.location.search;
const urlParams = new URLSearchParams(bazaarCeramicsString);
const itemPrice = urlParams.get("price");
const itemDesc = urlParams.get("description");
const itemName = urlParams.get("name");
const fileName = urlParams.get("slice");


/* Building up the values for inserting innerHTML into the Price and Desc sections */
let priceFiller = `	<label for="price">Price:</label>
<input type="text" name="price" id="price" value="${itemPrice}" size="3" maxlength="5" readonly>`

let descFiller = `<label for="itemDescription">Item Description</label>
							<input type="text" name="itemDescription" id="iDesc" value="${itemDesc}" size="40" readonly>`
						

/* Setting global variables*/
let dispImg = "";
let dirName = "../../images/slicedimages/"
let row = 0;
let col = 0;


/* Building the Array of image objects - This Script tag is prior to the Body and
therefor will load the images into the cashe before the body starts to build */
const imgArray = new Array();
let x = 0;
for(let row = 0; row < 4; row++){
  for(let col = 0; col <  5; col++){
    imgArray[x] = new Image();
    imgArray[x].src = `${dirName}${fileName}/${fileName}_r${row+1}_c${col+1}.jpg`
    imgArray[x].alt = `A picture of ${itemDesc}`

    //some console.log tracking to enable verifying correct end points / data
    console.log(imgArray[x].src);
    console.log(imgArray[x].alt);
    console.log(" --------------" + (x+1) + "------------------------ ");

    x++;
  }
 }


 /* Function executes on members_orders page onload event in the body. This replaces the
placeholder information with the query string data corosponding with the user selection */
 function bodyInfoUpdate(){
  document.getElementById("itemsName").innerHTML = itemName;
  document.getElementById("itemsName2").innerHTML = "Order Item - " + itemName;
  document.getElementById("descInsert").innerHTML = descFiller;
  console.log(descFiller);
  document.getElementById("priceInsert").innerHTML = priceFiller;
  return;
}


/* The following nested for loop only starts to run after the rest of the page info elements are 
loaded. This is so that users can see the content of the page builds up rather than wait for the
image to display. It uses the variable dispImg through concatenation which points to the pre loaded
image and injects the value as HTML into the members_order page. The result is a table holding a 
differnet image in each cells dipicting the pieced together  */
document.addEventListener('DOMContentLoaded', function() {
  let x = 0;  
  for(let row = 0; row < 4; row++){
      dispImg += "<tr>" /*Start of concatenation */
      for(let col = 0; col <  5; col++){
        dispImg += "<td>"
        dispImg += `<img src="${imgArray[x].src}" alt="${imgArray[x].alt}"></td>`
        // console.log(dispImg);
        x++;
      }
      dispImg += "</tr>" /* Final concatenation*/
    document.getElementById('imageSlices').innerHTML = dispImg; /* Inserts the HTML code */
    }
}, false);