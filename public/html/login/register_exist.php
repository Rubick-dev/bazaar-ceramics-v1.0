<?php require_once('../../../private/initialise.php');

$errors = [];
$customer_email = '';


if(is_logged_in()){
  redirect_to(url_for('/index.php'));
} else {
  // Checks for post request to increase security
  if(is_post_request()) {

    $customer_email = $_POST['customer_email'] ?? ''; // Storing customer email as variable

    // Validations
    if(is_blank($customer_email)) {
      $errors[] = "email address cannot be blank.";
    }

    if(true){

    }

    // ###################################################################
    // THIS IS THE CODE I AM UP TO AT THE MOMENT NEEDS Massive adjustments
    // ###################################################################

    // if there were no errors, try to login
    if(empty($errors)) {
      // Using one variable ensures that msg is the same
      $login_failure_msg = "Log in was unsuccessful.";

      $member = find_member_by_username($username);
      if($member) {

        // if(password_verify($password, $member['HashedPassword'])) {
          if($password === $member['HashedPassword']) {
          // password matches
          log_in_member($member);
          redirect_to(url_for('/index.php'));
        } else {
          // username found, but password does not match
          $errors[] = $login_failure_msg;
        }
      } else {
        // no username found
        $errors[] = $login_failure_msg;
      }
    }
  }
}

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

      <form action="/register_exist.php" method="post">
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
