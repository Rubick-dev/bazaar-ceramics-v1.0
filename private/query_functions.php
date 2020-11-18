<?php

// Checking to see that user with membership is in the db
function find_member_by_username($username) {
  global $db;

  $sql = "SELECT * FROM member ";
  $sql .= "WHERE UserID='" . db_escape($db, $username) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $member = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $member; // returns an assoc. array
}

// finds a users email in the sql database and returns null or CustomerID value
function find_customer_by_email($customer_em){
  global $db;

  $sql = "SELECT CustomerID FROM customer ";
  $sql .= "WHERE CustomerEmail='" . db_escape($db, $customer_em) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $customer_id = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $customer_id; // returns null or customerID
}

// finds a users email in the member database and returns null or CustomerID
function find_member_by_ID($memid){
  global $db;

  $sql = "SELECT CustomerID FROM member ";
  $sql .= "WHERE CustomerID='" . db_escape($db, $memid) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $member_id = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $member_id; // returns null or memberID
}

//Inserts memeber data into members database.
function insert_member($cid, $member) {
  global $db;

  // Hashed passwords through BCRYPT / Blowfish in PHP 7.0+ automatically salt
  // at random  values - Salting is deprecated
  $hashed_pw = password_hash($member['password'], PASSWORD_BCRYPT, ['cost' => 10]);

  $sql = "INSERT INTO member ";
  $sql .= "(CustomerID, UserID, HashedPassword) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $cid) . "',";
  $sql .= "'" . db_escape($db, $member['user_id']) . "',";
  $sql .= "'" . db_escape($db, $hashed_pw) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  // Checking if INSERT statements returned a true/false and reporting
  if($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

//Inserts data into customers database only.
function insert_new_customer($customer) {
  global $db;

  $sql = "INSERT INTO customer ";
  $sql .= "(CustomerGivenName, CustomerLastName, CustomerEmail, CustomerAddress, CustomerPhoneNumber, CustomerAccountFlag) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $customer['first_name']) . "',";
  $sql .= "'" . db_escape($db, $customer['last_name']) . "',";
  $sql .= "'" . db_escape($db, $customer['customer_email']) . "',";
  $sql .= "'" . db_escape($db, $customer['address']) . "',";
  $sql .= "'" . db_escape($db, $customer['phone']) . "',";
  $sql .= "'" . db_escape($db, 0) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  // Checking if INSERT statements returned a true/false and reporting
  if($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
// ##### PRAC TASK F ADDITIONS ####


// Checking to see if the product exists in the database.
function find_product_by_name($product_name){
  global $db;

  $sql = "SELECT ProductID FROM product ";
  $sql .= "WHERE ProductID='" . db_escape($db, $product_name) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $product_id = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  // print_r($product_id);
  return $product_id; // returns null or productID
}

// Checking to see if product exists in orderline
function product_exists_in_orderline($prodID){
  global $db;

  $sql = "SELECT ProductID FROM OrderLine ";
  $sql .= "WHERE ProductID='" . db_escape($db, $prodID) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $product_id = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  // print_r($product_id);
  return $product_id; // returns null or productID
}

//Inserts memeber data into members database.
function insert_new_order($new_order) {
  global $db;
 
  $sql = "INSERT INTO orders ";
  $sql .= "(CustomerID, OrderDate) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $new_order) . "',";
  $sql .= " curdate()";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  // Checking if INSERT statements returned a true/false and reporting
  if($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Gets the latest new order ID for use in a session
function get_new_order_OrderID(){
  global $db;

  $result = mysqli_insert_id($db);
  return $result;
};

// Getting cart details
function get_cart_total(){
  global $db;

  if($_SESSION['cart'] === 0){
    return 0;    
  } else {
  $cartID = $_SESSION['current_cart_ID'];
  $total = calculate_total_ordered_items($cartID);
  return $total;
  }
}

//Inserts memeber data into members database.
function insert_new_orderline($cartID, $prodname, $quantity) {
  global $db;
 
  $sql = "INSERT INTO orderline ";
  $sql .= "(OrderID, ProductID, OrderQuantity) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $cartID) . "',";
  $sql .= "'" . db_escape($db, $prodname) . "',";
  $sql .= "'" . db_escape($db, $quantity) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  // Checking if INSERT statements returned a true/false and reporting
  if($result) {
    return true;
  } else {
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}

// Total items ordered calculation
function calculate_total_ordered_items($con) {
  global $db;
  
  $sql = "SELECT SUM(OrderQuantity) FROM orderline ";
  $sql .= "WHERE OrderID = " . $con;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $calcsumofcartitems = mysqli_fetch_assoc($result); 
  mysqli_free_result($result);
  return $calcsumofcartitems['SUM(OrderQuantity)'];
}

// Checks if product has been ordered alredy
function has_product_been_ordered($curcartID, $product_name){
  global $db;

  $sql = "SELECT * FROM orderline ";
  $sql .= "WHERE OrderID = " . $curcartID;
  $sql .= " AND ProductID = " . "'" . db_escape($db, $product_name) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $orderline_set = mysqli_fetch_assoc($result); // find first
  mysqli_free_result($result);
  return $orderline_set; // returns null or Orderline_set array
}

// Updating quantity on an already ordered item in cart
function update_orderline($curcartid, $prod_name, $order_quant){
  global $db;

    $sql = "UPDATE orderline SET ";
    $sql .= "OrderQuantity = " . $order_quant;
    $sql .= " WHERE OrderID = " . $curcartid;
    $sql .= " AND ProductID = '" . db_escape($db, $prod_name) . "'";
    
    echo $sql;
    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
}

function get_new_quantity_value($prdID, $currentCartID) {
  global $db;
  
  $sql = "SELECT OrderQuantity FROM orderline ";
  $sql .= "WHERE ProductID = '" . db_escape($db, $prdID) . "' "; ;
  $sql .= "AND OrderID = " . $currentCartID;
  $sql .= " LIMIT 1";
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $current_quantity = mysqli_fetch_assoc($result); 
  mysqli_free_result($result);
  return $current_quantity['OrderQuantity'];
}


function show_cart($get_cart_orderID) {
  global $db;

  $sql = "SELECT ProductID, ProductDescription, OrderQuantity, ProductPrice, OrderQuantity * ProductPrice as ItemTotal ";
  $sql .= "FROM orderline ";
  $sql .= "INNER JOIN product USING (ProductID) ";
  $sql .= "WHERE OrderID=" . db_escape($db, $get_cart_orderID);
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $cart = [];
  $total_cart_value = 0;

  while ($row =mysqli_fetch_row($result)){
    $string = "<tr>";
    $string .= "<td>" . $row[0] . "</td>";
    $string .= "<td>" . $row[1] . "</td>";
    $string .= "<td>" . $row[2] . "</td>";
    $string .= "<td>" . $row[3] . "</td>";
    $string .= "<td>" . $row[4] . "</td>";
    $string .= "<td><img src=" . "../../images/members/cancel_order.png" . " class='cancelImg'></img></td>";
    $string .= "</tr>";
    array_push($cart, $string);
    $total_cart_value = $total_cart_value + $row[4];
  }; 
  $_SESSION['cart_total'] = $total_cart_value;
  mysqli_free_result($result);
  return $cart;
}

// function calc_total($get_cart_orderID) {
//   global $db;

//   $sql = "SELECT OrderQuantity, ProductPrice, OrderQuantity * ProductPrice as ItemTotal ";
//   $sql .= "FROM orderline ";
//   $sql .= "INNER JOIN product USING (ProductID) ";
//   $sql .= "WHERE OrderID=" . db_escape($db, $get_cart_orderID);
//   $result = mysqli_query($db, $sql);
//   confirm_result_set($result);
//   $total=0;

//   while ($row =mysqli_fetch_row($result)){
//     $total=$total + $row[2];
//   }; 

//   mysqli_free_result($result);
//   return $total;
// }


?>

