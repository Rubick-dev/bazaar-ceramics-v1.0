<?php require_once('../../../private/initialise.php');

$errors = [];
$member = [];

// Must not be logged in to be able to become a member. Redirects if loggedin
if(is_logged_in()){
  redirect_to(url_for('/index.php'));

} else {
  // Checks for post request to increase security
  if(is_post_request()) {

    // Sets variables for users input on registration form
    $member['customer_email'] = $_POST['customer_email'] ?? '';
    $member['user_id'] = $_POST['user_id'] ?? '';
    $member['password'] = $_POST['password'] ?? '';
    $member['confirm_password'] = $_POST['confirm_password'] ?? '';

    $errors = validate_member($member);
    // If validations pass this logic will run   
    if(empty($errors)) {
      
      //STEP 1 check if email address is registered in customers database
      $customer_id = '';
      $member_id = '';
      $customer_id = find_customer_by_email($member['customer_email']);
      $member_id = find_member_by_ID($customer_id['CustomerID']);      
      if($customer_id) {
        if($member_id) {
          $errors[] = "You already are a member, contact Bazaar Ceramics support if you cannot access your account";
        } else {
          // CustomerID is found and no corrosponding memberID - enable creation of new member account
          insert_member($customer_id['CustomerID'], $member);
          echo "Registered!!";
          redirect_to(url_for('/html/login/login.php?reg=1&req=0'));
        }
      } else {
      $errors[] = "The email address you have entered is not known to Bazaar Ceramics. If you are a new customer, please click the New Customer Registration button to signup now";
      }
    } //End of member insert logic
  } // End of user input validation checks      
} // End of top of the page else statement

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
      <div class="formSection">
        Email Address:<br />
        <input type="text" name="customer_email" value="" /><br />
      </div>
      <div class="formSection">
        User Name:<br />
        <input type="text" name="user_id" value="" /><br />
      </div>
      <div class="formSection">
        Password:<br />
        <input type="password" name="password" value="" /><br />
      </div>
      <div class="formSection">
        Confirm Password:<br />
        <input type="password" name="confirm_password" value="" /><br />
      </div>
      <div class="formSection">
        <input id="regobtn" class="btn" type="submit" name="submit" value="Register"  />
      </div>
      </form>
      <?php echo display_errors($errors); ?>
      <br><br>
    </div> <!-- end of login form -->


<!-- Navigation to register -->
    <div class="otherOptions">
      <div class="buttons">
        <p class="registerText">Not a registered customer? Click here to register.</p>
        <a href="<?php echo url_for('/html/login/register_new.php'); ?>">
          <input class="btn" type="button" class="" value="New Customer Rego"  /> 
        </a>   
        <br><br>
        <form action="<?php echo url_for('/html/login/logout.php'); ?>">
          <input type="submit" name="submit" value="Cancel Registration" class="cancelButton" />
        </form>
      </div><!-- end of buttons div -->
    </div> <!-- end of otherOptions div -->

  </div> <!-- end of page container section -->

  <?php include(SHARED_PATH . '/login_footer.php'); ?>
