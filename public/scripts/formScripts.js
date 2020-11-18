/* This function stores the values of price and quantity into a variable, then runs
a check to see if the numbers are valid. Upon valid numbers being identified it 
then runs a calculations and inserts the result in the total price column */ 

function sum(){
  // Storing variables
  let val1 = document.getElementById('quantity').value;
  console.log(val1);
  let val2 = parseInt(itemPrice);
   
  // Conducting the validity of the quantity value entered by the user and notifying if errors
  if(val1 < 1 || val1===null || isNaN(val1)){
    alert("Please ensure you enter a numeric value greater than zero into the quantity field");
    return 0;
  } else {
    let result = parseFloat(val1)*parseFloat(val2);
    document.getElementById('totalPrice').value=result;
  }
  return 1;
}

// function to clear the values in the quantity and total price columns
function clearValues(){
  document.getElementById('quantity').value="";
  document.getElementById('totalPrice').value="";
  result = "";
return;
}

// Function to run checks and add an order to the orders table upon
// pressing the submit button
function submitForm(){
  let res=sum();
  if(res === 0) {
    return false;
  } else {   
    document.getElementById('form').setAttribute('method', 'post');
    document.getElementById('form').setAttribute('action', 'members_orders.php');
    alert('We have added the item to your cart');
    return true;    
  }
}

function clearValues2(){
  document.getElementById('formFirstName').value="";
  document.getElementById('formLastName').value="";
  document.getElementById('formAddress').value="";
  document.getElementById('formPhone').value="";
  document.getElementById('formEmail').value="";
  document.getElementById('formUserID').value="";
  document.getElementById('formPW').value="";
  document.getElementById('formPW2').value="";
  
  result = "";
return;
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