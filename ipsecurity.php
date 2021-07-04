<?php
session_start();
if (!(isset($_SESSION['login']))) {

    header('location:index.php');
}

include 'includes/header.php';

$user = $obj->getuserinfo($table, $client);


?>
</br>
<!--- Api Token --->
<div class="container">
    <h4>Client IP</h4>
    <div class="row">
        <div class="col-md-6 col-sm-8 shadow-lg p-3 mb-5 bg-body rounded">
            <form method="POST" action="userfn.php">
                <div class="row">
                    <div class="col-10 mx-2 p-2">
                        <label for="ip" class="form-label"> IP Address </label>
                        <input type="text" class="form-control" aria-describedby="apihelpblock" name="ip" id="ip" value="<?php echo $user->device_id; ?>" aria-label="Text input with dropdown button">


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
                        <button type="submit" name="updateip" class="btn btn-primary">Change IP</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</br>
<?php include 'includes/footer.php'; ?>