<?php

// ##############################
// ###    Utility Functions   ###
// ##############################
function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function u($string="") {
  return urlencode($string);
}

function raw_u($string="") {
  return rawurlencode($string);
}

function h($string="") {
  return htmlspecialchars($string);
}

function redirect_to($location) {
  header("Location: " . $location);
  exit;
}

function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

// ##################################################
// ###   Error checking and messaging functions   ###
// ##################################################
function error_404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

function error_500() {
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

function display_errors($errors=array()) {
  $output = '';
  if(!empty($errors)) {
    $output .= "<div class=\"errors\">";
    $output .= "Please repair the following errors:";
    $output .= "<ul>";
    foreach($errors as $error) {
      $output .= "<li>" . h($error) . "</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";
  }
  return $output;
}

// ##################################################
// ###            SESSION MANAGEMENT              ###
// ##################################################

// These two functions following work together to collect username and display oneach page
function get_user_welcome_message() {
  if(isset($_SESSION['username']) && $_SESSION['username'] != '') {
    $msg = $_SESSION['username'];
    return $msg;
  }
}

function display_welcome_message() {
  $msg = get_user_welcome_message();
  if(!is_blank($msg)) {
    return '<div id="loggedINMsg">' . 'Welcome to the Bazaar Ceramics Website ' . h($msg) . '</div>';
  }
}

function display_cart_errors() {
  $msg2 = "You must have items in your cart to access the Shopping Cart :)";
  return '<div id="loggedINMsg">' . h($msg2) . '</div>';
  }

function get_and_clear_session_message() {
  if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
    $msg = $_SESSION['message'];
    unset($_SESSION['message']);
    return $msg;
  }
}

function display_session_message() {
  $msg = get_and_clear_session_message();
  if(!is_blank($msg)) {
    return '<div id="message">' . h($msg) . '</div>';
  }
}

// ##################################################
// ###            Displaying Cart Items           ###
// ##################################################

// These functions run the logic to display cart items on the cart & confirm orders pages

function show_right_link($has_cart){
  if ($has_cart === 0){        
    $result = url_for('index.php');    
    return $result;
  } else {
    echo "This logic has run";
    $result = url_for('/html/members/cart.php');
    return $result;
  }
}



?>