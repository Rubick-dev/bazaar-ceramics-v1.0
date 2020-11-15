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


?>
