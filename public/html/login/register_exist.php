<?php require_once('../../../private/initialise.php');

$errors = [];
$customer_email = '';
$user_id = '';
$password = '';
$confirm_password = '';


// Must not be logged in to be able to become a member. Redirects if loggedin
if(is_logged_in()){
  redirect_to(url_for('/index.php'));

} else {
  // Checks for post request to increase security
  if(is_post_request()) {

    // Sets variables for users page form inputs
    $customer_email = $_POST['customer_email'] ?? '';
    $user_id = $_POST['user_id'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // User Input Validations
    // Checking for blanks and returning errors if so
    if(is_blank($customer_email)) {
      $errors[] = "Email address cannot be blank.";
    } else if(!has_valid_email_format($customer_email)){
      $errors[] = "Please enter a valid email address";
    } 

    // User Name validation checks
    if(is_blank($user_id)) {
      $errors[] = "User name cannot be blank.";
    } else if(!should_not_have_chars($user_id)) {
      $errors[] = "User name cannot contain the following symbols '/ . % \ @ ?'";
    } 

    // Password Validation checks
    if( (is_blank($password)) || (is_blank($confirm_password)) ) {
      $errors[] = "Either password field cannot be blank.";
    } else if($password !== $confirm_password) {
      $errors[] = "Passwords do not match";
    } else if(strlen($password) <= 5) { 
      $errors[] = "Password must be at least 6 characters long";
    } else if(!has_password_only_chars($password)){
      $errors[] = "Password must contain only numbers, letters or . or / and contain no spaces";
    } 
      
    //STEP 1 check if email address is registered in customers database
    if(empty($errors)) {

      $does_customer_exist = find_member_by_email($customer_email);
            
      if($does_customer_exist) {
        $errors[] = "Did detect"; //To be removed
      } else {
      $errors[] = "The email address you entered is not currently registerd under a current customer. Click the New Customer Registration button to signup now";
      }
    }
  } // End of user input validation checks      
} // End of top of the page else statement


    // #######################################################################
    // # THIS IS THE CODE I AM UP TO AT THE MOMENT NEEDS Massive adjustments #
    // #######################################################################


?>

<?php $page_title = 'BC - Members Rego'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/styles/styles3.css'); ?>" />
</head>

<!-- Insert a check to see if already logged in. redirect to logged in and update page -->

<body>
  <div id="container">
    <div class="logo">
    <a id="logoA" href="<?php echo url_for('/index.php'); ?>">
      <img alt="Image of Bazaar Ceramics logo" id="logoImage" 
      src="<?php echo url_for('/images/logo/bazaar-logo.jpg'); ?>" /></a>  
    </div>

    <div class="loginSection">
      <h1>Existing Customer Members Registration</h1>

      <form action="register_exist.php" method="post">
      <p class="registerText">Please enter the following fields and click the Register button when complete:<br /><br />
      Email Address:<br />
      <input type="text" name="customer_email" value="" /><br />
      User Name:<br />
      <input type="text" name="user_id" value="" /><br />
      Password:<br />
      <input type="password" name="password" value="" /><br />
      Confirm Password:<br />
      <input type="password" name="confirm_password" value="" /><br />
      <input type="submit" name="submit" value="Register"  />
      </form>
      <?php echo display_errors($errors); ?>
      <br><br>
    </div> <!-- end of login form -->


<!-- Navigation to register -->
    <div class="otherOptions">
      <div class="buttons">
        <p class="registerText">Not a registered customer? Click here to register.</p>
        <a href="<?php echo url_for('/html/login/register_new.php'); ?>">
          <input type="button" class="" value="New Customer Registration"  /> 
        </a>   
        <br><br>
        <form action="<?php echo url_for('/html/login/logout.php'); ?>">
          <input type="submit" name="submit" value="Cancel Registration" class="cancelButton" />
        </form>
      </div><!-- end of buttons div -->
    </div> <!-- end of otherOptions div -->

  </div> <!-- end of page container section -->

  <?php include(SHARED_PATH . '/login_footer.php'); ?>
