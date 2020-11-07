<?php require_once('../../../private/initialise.php');

$errors = [];

// Must not be logged in to be able to become a member. Redirects if loggedin
if(is_logged_in()){
  redirect_to(url_for('/index.php'));

} else {
  // Checks for post request to increase security
  if(is_post_request()) {

    // Sets variables for member and customer table entires form inputs
    $customer = [];
    $member = [];

    $customer['first_name'] = $_POST['first_name'] ?? '';
    $customer['last_name'] = $_POST['last_name'] ?? '';
    $customer['address'] = $_POST['address'] ?? '';
    $customer['phone'] = $_POST['phone'] ?? '';
    $customer['customer_email'] = $_POST['customer_email'] ?? '';
    
    $member['customer_email'] = $_POST['customer_email'] ?? '';
    $member['user_id'] = $_POST['user_id'] ?? '';
    $member['password'] = $_POST['password'] ?? '';
    $member['confirm_password'] = $_POST['confirm_password'] ?? '';
    
    // User Input Validations
    // Checking for blanks and returning errors without breaking the code
    
    $merrors = validate_member($member);
    $cerrors = validate_customer($customer);
    if(($merrors) && ($cerrors)) {
      $errors = array_merge($merrors, $cerrors);
    } else if((!$merrors) && ($cerrors)) {
      $errors = $cerrors;
    } else if ((!$cerrors) && ($merrors)) {
      $errors = $merrors;
    }
    

    //STEP 1 check if email address is registered in customers database
    if(empty($errors)) {
      
      $customer_id = find_customer_by_email($customer['customer_email']);
      $member_id ='';

      if($customer_id) {
        $errors[] = "The email address must be unique, please try again with a different email address";
      } else {

        if(insert_new_customer($customer)) {
          $member_id = find_customer_by_email($customer['customer_email']);
          print $member_id['CustomerID'];
          insert_member($member_id['CustomerID'], $member);
          echo "Registered!!";
          redirect_to(url_for('/html/login/login.php?reg=1'));
        } else {
          $errors[] = "There was an error creating your member account, please try again!";
        }
      }

    } 
     //End of member insert logic
  } 
  // End of user input validation checks      
} 
// End of top of the page else statement
?>

<?php $page_title = 'BC - Customer Rego'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<script src="../../scripts/formScripts.js"></script>
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
      <h1>Customer Registration</h1>

      <form action="register_new.php" method="post">
      <p class="registerText">Please enter the following fields and click the Register button below when complete:<br /><br />
      
      <div>
        <h4 class="customerInfo">Customer Registration Information</h4>
        <div class="formSection">
          First Name:<br />
          <input id="formFirstName" type="text" name="first_name" value="" /><br />
        </div>

        <div class="formSection">
          Last Name:<br />
          <input id="formLastName" type="text" name="last_name" value="" /><br />
        </div>

        <div class="formSection">
          Address:<br />
          <input id="formAddress" type="text" name="address" value="" /><br />
        </div>

        <div class="formSection">
          Phone Number:<br />
          <input id="formPhone" type="text" name="phone" value="" /><br />
        </div>
      </div> <!-- end of customerInfo -->

      <div class="memberInfo">
        <h4>Member Rego Infromation</h4>
        <div class="formSection">
          Email Address:<br />
          <input id="formEmail" type="text" name="customer_email" value="" /><br />
        </div>

        <div class="formSection">
          User Name:<br />
          <input id="formUserID" type="text" name="user_id" value="" /><br />
        </div>

        <div class="formSection">
          Password:<br />
          <input id="formPW" type="password" name="password" value="" /><br />
        </div>

        <div class="formSection">
          Confirm Password:<br />
          <input id="formPW2" type="password" name="confirm_password" value="" /><br />
        </div>
      </div> <!-- end of memberInfo -->

      <div class="formSection">
        <input id="regobtn" class="btn" type="submit" name="submit" value="Register"  />
        <br><br>
        <button class="btn" id="clrBtn" onclick="clearValues2(); return false">Clear</button>
      </div>

      </form>
      <?php echo display_errors($errors); ?>
      <br><br>
    </div> <!-- end of login form -->


<!-- Navigation to register -->
    <div class="otherOptions">
      <div class="buttons">
        <p class="registerText">Already a registered customer? Click here to create an online member accout:</p>
        <a href="<?php echo url_for('/html/login/register_exist.php'); ?>">
          <input class="btn" type="button" class="" value="Existing Customer"  /> 
        </a>   
        <br><br>
        <form action="<?php echo url_for('/html/login/logout.php'); ?>">
          <input type="submit" name="submit" value="Cancel Registration" class="cancelButton" />
        </form>
      </div><!-- end of buttons div -->
    </div> <!-- end of otherOptions div -->

  </div> <!-- end of page container section -->

  <?php include(SHARED_PATH . '/login_footer.php'); ?>
