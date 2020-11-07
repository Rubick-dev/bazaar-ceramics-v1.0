<?php require_once('../../../private/initialise.php');

$errors = [];
$username = '';
$password = '';
$has_just_registered = '';
$isreg = htmlspecialchars($_GET["reg"]) ?? 0;

if(is_logged_in()){
  redirect_to(url_for('/index.php'));

} else {
// Checks for post request to increase security
  if(is_post_request()) {

    $username = $_POST['username'] ?? ''; // Storing user inputs as variables
    $password = $_POST['password'] ?? '';

    // Validations
    if(is_blank($username)) {
      $errors[] = "Username cannot be blank.";
    }
    if(is_blank($password)) {
      $errors[] = "Password cannot be blank.";
    }

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

<?php $page_title = 'BC - Login Page'; ?>
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
      <h1>Members Login</h1>
    <?php
    if($isreg) {
      echo "<div id='justReged'>Congratulations!!! You are now registered and are able to login</div>";
    }
    ?> 
      <form action="login.php" method="post">
      <div class="formSection">
        Username:<br />
        <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
      </div>
      <div class="formSection">
        Password:<br />
        <input type="password" name="password" value="" /><br />
      </div>
      <div>  
        <input class="btn" id="loginbtn" type="submit" name="submit" value="Login"  />
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
