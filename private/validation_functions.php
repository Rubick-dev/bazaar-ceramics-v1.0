<?php

// validate data presence
function is_blank($value) {
  return !isset($value) || trim($value) === '';
}

// validate correct format for email addresses
function has_valid_email_format($value) {
  $email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
  return preg_match($email_regex, $value);
}

// validate permitted password characters only
function has_password_only_chars($value) {
  $email_regex = '/^[a-zA-Z0-9.\/]+$/';
  return preg_match($email_regex, $value);
}

// user_id prohibited chars
function should_not_have_chars($value) {
  $user_id = '/^[^.%\\\\@?\/]+$/';
  return preg_match($user_id, $value);
}

// built in function of PHP to only allow numbers
function only_has_nums($value) {
  if(ctype_digit($value)) {
    return 1; 
  } else {
  return 0;
  }
}

// runs the validation of a member registration info for
//both the new and exsiting rego pages
function validate_member($member) {
  $errors = [];

    // PW validation checks
    if(is_blank($member['customer_email'])) {
      $errors[] = "Email address cannot be blank.";
    } else if(!has_valid_email_format($member['customer_email'])) {
      $errors[] = "Please enter a valid email address";
    } 

    // User Name validation checks
    if(is_blank($member['user_id'])) {
      $errors[] = "User name cannot be blank.";
    } else if(!should_not_have_chars($member['user_id'])) {
      $errors[] = "User name cannot contain the following symbols '/ . % \ @ ?'";
    } 

    // Password Validation checks
    if( (is_blank($member['password'])) || (is_blank($member['confirm_password'])) ) {
      $errors[] = "Either password field cannot be blank.";
    } else if($member['password'] !== $member['confirm_password']) {
      $errors[] = "Passwords do not match";
    } else if(strlen($member['password']) <= 5) { 
      $errors[] = "Password must be at least 6 characters long";
    } else if(!has_password_only_chars($member['password'])){
      $errors[] = "Password must contain only numbers, letters or . or / and contain no spaces";
    } 

  return $errors;
}

// runs the validation of the customer registration info
// only on the exsiting rego pages
function validate_customer($customer) {
  $errors = [];

  // Checking for blank entries 
  if(is_blank($customer['first_name'])){
    $errors[] = "First name cannot be blank.";
  } 

  if(is_blank($customer['last_name'])){
    $errors[] = "Last name cannot be blank.";
  } 

  if(is_blank($customer['address'])){
    $errors[] = "You must provide your address.";
  } 

  if(is_blank($customer['phone'])){
    $errors[] = "Phone number cannot be blank.";
    } else if(!only_has_nums($customer['phone'])) {
    $errors[] = "Phone numbers can only take numbers with no spaces.";
    }

    return $errors;
  }