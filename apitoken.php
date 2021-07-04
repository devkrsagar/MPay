<?php
session_start();
if (!(isset($_SESSION['login']))) {

  header('location:index.php');
}

include 'includes/header.php';

$api = $obj->getuserinfo($table, $client);


?>
</br>
<!--- Api Token --->
<div class="container">
  <h4>Api Token</h4>
  <div class="row">
    <div class="col-md-6 col-sm-8 shadow-lg p-3 mb-5 bg-body rounded">
      <form method="POST" action="userfn.php">
        <div class="row">
          <div class="col-10 mx-2 p-2">
            <label for="inputapi" class="form-label"> Api Token </label>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="token" id="token" value="<?php echo $api->api_key; ?>" aria-label="Text input with dropdown button" readonly>
              <div class="input-group-prepend">
                <button class="btn btn-outline-secondary" onclick="apigen();" type="button" aria-haspopup="true" aria-expanded="false">New</button>
              </div>


            </div>

            <div id="apihelpblock" class="form-text">
              Don't share this token with anybody.
            </div>
            <label for="inputapi" class="form-label"> Password </label>
            <input type="hidden" name="client_id" value="<?php echo $client; ?>">
            <input type="password" id="inputapi" name="password" class="form-control" aria-describedby="apihelpblock">
            <div id="apihelpblock" class="form-text">
              Don't share this token with anybody.
            </div>
            </br>
            <button type="submit" name="updatetoken" class="btn btn-primary">Change Token</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</br>
<script>
  function apigen() {
    var characters = "ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";

    //specify the length for the new string
    var lenString = 20;
    var randomstring = '';

    //loop to select a new character in each iteration
    for (var i = 0; i < lenString; i++) {
      var rnum = Math.floor(Math.random() * characters.length);
      randomstring += characters.substring(rnum, rnum + 1);
    }
    document.getElementById("token").value = randomstring;
  }
</script>

<?php include 'includes/footer.php'; ?>