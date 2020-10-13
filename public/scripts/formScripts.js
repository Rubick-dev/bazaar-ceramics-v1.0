/* This function stores the values of price and quantity into a variable, then runs
a check to see if the numbers are valid. Upon valid numbers being identified it 
then runs a calculations and inserts the result in the total price column */ 

function sum(){
  // Storing variables
  let val1 = document.getElementById('quantity').value;
  let val2 = parseInt(itemPrice);
   
  // Conducting the validity of the quantity value entered by the user and notifying if errors
  if(val1 < 1 || val1===null || isNaN(val1)){
    alert("Please ensure you enter a numeric value greater than zero into the quantity field");
  }

  // Checks the validity of price, if it is invlaid, it resets price back to initial and performs
  // the calculation. ### This can no longer fail as the price field has become readonly ###
  else if(val2 < 1 || val2===null || isNaN(val2)){
    val2 = parseInt(itemPrice);
    let result = parseFloat(val1)*parseFloat(val2);
    document.getElementById('totalPrice').value=result;
  }

  // if varibables are appropriate values, performs the calc and inserts the result
  else{
    let result = parseFloat(val1)*parseFloat(val2);
    document.getElementById('totalPrice').value=result;
  }
  return;
}

// function to clear the values in the quantity and total price columns
function clearValues(){
  document.getElementById('quantity').value="";
  document.getElementById('totalPrice').value="";
  result = "";
return;
}

// Function to provide a confirm box and information list on pressing the submit button
function submitForm(){

  // Builds the message from the user data for the confirm dialog box message.
  let message = "You are about to order the following items\n\n ";
  message += "Name: " + itemName + "\n ";
  message += "Item Description: ";
  message += document.getElementById("iDesc").value + "\n ";
  message += "Quantity: ";
  message += document.getElementById("quantity").value + "\n ";
  message += "Unit Price: ";
  message += document.getElementById("price").value + "\n ";
  message += "Total Price: ";
  message += document.getElementById("totalPrice").value + "\n\n ";
  message += "Is this corrrect?";

  // Displays the confirmation message upon user click and sets a boolean variable 
  // or the user reaction
  let conf = confirm(message);

  // Clears the form data if the cancel button is pressed
  if (conf===false){
    clearValues() 
  }
  //I would make an else statement invoking the Sumbit method here however since the
  // data isnt going anywhere i decided not to add it in 
}


/// POPUP WINDOW OPENER AND CLOSER CONTENT
// Global Variable
var windowChecker = "";

// Window.Open function to only allow one window to pop up on item click.
function openMembersOrderWindow(fileName){
  if(windowChecker) {
     windowChecker.close();
  }
  var omow = window.open(fileName,'currentMOWindow', "width=1000, height=900, resizable=yes");
  return omow;
}

// Close window function
function closeWindow(){
  if(windowChecker.closed) {
    //DoNothing
  } else {
    windowChecker.close();
  }
  return;
}