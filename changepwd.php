<?php
session_start();
if (!(isset($_SESSION['login']))) {

  header('location:index.php');
}

include 'includes/header.php';
$user = $obj->getuserinfo($table, $client);

?>

<!--- Password Change --->
<div class="container">
  <h4>Change Password</h4>
  <div class="row">
    <div class="col-md-6 col-sm-8 shadow-lg p-3 mb-5 bg-body rounded">
      <div class="row">
        <form method="POST" action="userfn.php">
          <div class="col-10 mx-2 p-2">
            <label for="inputPassword5" class="form-label">Old Password</label>
            <input type="password" name="password" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
              Enter Old Password!
            </div>
            <label for="inputPassword6" class="form-label">New Password</label>
            <input type="hidden" name="client_id" value="<?php echo $client; ?>">
            <input type="password" id="inputPassword6" name="newpwd" class="form-control" aria-describedby="passwordHelpBlock2">
            <div id="passwordHelpBlock2" class="form-text">
              Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>
            </br>
            <button type="submit" name="chngepwd" class="btn btn-primary">Change Password</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</br>
<!-----Password Change ------>
<?php include 'includes/footer.php'; ?>