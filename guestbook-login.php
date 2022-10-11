<?php
require_once('config/config.php');
require_once('config/db.php');



if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  // echo json_encode(array($username, $password)) . '</br>';

  $query_str = "SELECT * FROM account WHERE username = '$username' AND password = '$password'";

  // echo $query_str . '</br>';
  $query = mysqli_query($conn, $query_str);
  $result = mysqli_num_rows($query) > 0? mysqli_fetch_assoc($query) : false;

  if ($result) {
    // echo 'query: ' . json_encode($result);
    header('Location: guestbook-list.php');
    echo '
        <div class="invalid" style="background:green; text-align: center; padding: 5px; color: white;">
          Success
        </div>
    ';
  } else {
    echo '
        <div class="invalid" style="background:red; text-align: center; padding: 5px; color: white;">
          Invalid username or password.
        </div>
    ';
  }
}


?>
<?php include('inc/header.php'); ?>
<br />
<div style="width:30%; margin: auto; text-align: center;">
  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-signin">
    <img class="mb-4" src="img/bootstrap.svg" alt="" width="100" height="100">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Username</label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
    <br /><label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button type="submit" name="submit" value="Submit" class="btn btn-lg btn-primary btn-block">Sign in</button>

  </form>
</div>
<?php include('inc/footer.php'); ?>