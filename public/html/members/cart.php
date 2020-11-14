<?php require_once('../../../private/initialise.php');?>
<?php require_login(); ?>

<?php
$errors = [];
$username = '';
$password = '';
$has_just_registered = '';

// psuedo code - if no items in cart - return to members section with an error message
// else - get cart items list from the database and return a result set for display

// Checks for post request to increase security
// if(is_post_request()) {

//   $username = $_POST['username'] ?? ''; // Storing user inputs as variables
//   $password = $_POST['password'] ?? '';

//   // Validations
//   if(is_blank($username)) {
//     $errors[] = "Username cannot be blank.";
//   }
//   if(is_blank($password)) {
//     $errors[] = "Password cannot be blank.";
//   }

//   // if there were no errors, try to login
//   if(empty($errors)) {
//     // Using one variable ensures that msg is the same
//     $login_failure_msg = "Log in was unsuccessful.";

//     $member = find_member_by_username($username);
//     if($member) {

//       if(password_verify($password, $member['HashedPassword'])) {
//         // password matches
//         log_in_member($member);
//         redirect_to(url_for('/index.php'));
//       } else {
//         // username found, but password does not match
//         $errors[] = $login_failure_msg;
//       }
//     } else {
//       // no username found
//       $errors[] = $login_failure_msg;
//     }
//   }
// }
// 
?>

<?php $page_title = 'BC - Shopping Cart'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<link rel="stylesheet" media="all" href="<?php echo url_for('/styles/styles3.css'); ?>" />
</head>

<!-- Insert a check to see if already logged in. redirect to logged in and update page -->

<body>
  <div id="container4">
    <div class="logo">
    <a id="logoA" href="<?php echo url_for('/index.php'); ?>">
      <img alt="Image of Bazaar Ceramics logo" id="logoImage" 
      src="<?php echo url_for('/images/logo/bazaar-logo.jpg'); ?>" /></a>  
    </div>

    <div class="cartSection">
      <h1><?php echo get_user_welcome_message() . "'s Shopping Cart" ?></h1>

      <div id="cartDiv">
        <table id="cartTableHeaderRow">
          <tr>
            <th class="tableHeading">Product Code</th>
            <th class="tableHeading">Description</th>
            <th class="tableHeading">Quantity</th>
            <th class="tableHeading">Unit Price</th>
            <th class="tableHeading">Total Price</th>
            <th class="tableHeading">Cancel</th>
          </tr>
        <!-- </table>
        <table id="insertCartItems"> -->
        <tr>
            <th class="tableHeading">12431223</th>
            <th class="tableHeading">I nice Vase made out of materials that are so mamazing but what if this just went on forewver and scewe the page apart soo badly</th>
            <th class="tableHeading">1</th>
            <th class="tableHeading">450</th>
            <th class="tableHeading">450</th>
            <th class="tableHeading">X</th>
          </tr>
          <tr>
            <th class="tableHeading">12315232342</th>
            <th class="tableHeading">Another lorem ipsum dollor products that are amazing</th>
            <th class="tableHeading">2</th>
            <th class="tableHeading">300</th>
            <th class="tableHeading">600</th>
            <th class="tableHeading">X</th>
          </tr>
        </table>

      </div> <!-- End of table of cart items  -->
      
      <form action="cart.php" method="post">
      <div class="formSection">
        <!-- Username:<br />
        <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
      </div>
      <div class="formSection">
        Password:<br />
        <input type="password" name="password" value="" /><br /> -->
      </div>
      <div>  
        <input class="btn" id="loginbtn" type="submit" name="submit" value="Order items"  />
      </div>
      </form>
      <?php echo display_errors($errors); ?>
      <br><br>
    </div> <!-- end of login form -->


<!-- Navigation to register -->
    <div class="otherOptions">
      <div class="buttons">
        <p class="registerText">Not a member yet? Register now as a New or Existing Customer:</p>
        <a href="<?php echo url_for('/html/login/register_new.php'); ?>">
          <input class="btn" type="button" value="New Customer" />
        </a>
        <a href="<?php echo url_for('/html/login/register_exist.php'); ?>">
          <input class="btn" type="button" value="Existing Customer"  /> 
        </a>   
        <br><br>
        <div>
          <form action="<?php echo url_for('/html/login/logout.php'); ?>">
            <input type="submit" name="submit" value="Cancel Login" class="cancelButton" />
          </form>
        </div> <!-- End of buttons Div -->
      </div>
    </div> <!-- end of otherOptions Div -->

  </div> <!-- end of page container section -->
<?php $has_just_registered = false ?>
<?php include(SHARED_PATH . '/login_footer.php'); ?>
