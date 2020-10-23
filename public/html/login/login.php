<?php require_once('../../../private/initialise.php'); ?>
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

      <form action="######.php" method="post">
      Username:<br />
      <input type="text" name="username" value="" /><br />
      Password:<br />
      <input type="password" name="password" value="" /><br />
      <input type="submit" name="submit" value="Submit"  />
      </form>
      <br><br>
    </div> <!-- end of login form -->



    <div class="otherOptions">
      <div class="buttons">
        <form action="newCustomer">
          <p>Existing Customer Membership Sign-up:</p>
          <input type="button" name="submit" value="Sign up now!"  />
        </form>
        <br>
        <form action="existingCustomer">
          <p>New Customer Member Sign-up</p>
          <input type="button" name="submit" value="Sign up now!"  />
        </form>
        <br>
        <form action="<?php echo url_for('/index.php'); ?>">
          <input type="submit" name="submit" value="Cancel Login" class="cancelButton" />
        </form>

    </div>

  </div> <!-- end of page container section -->

</body>
