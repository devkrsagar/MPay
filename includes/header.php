<?php 
$table = "client_id";
$client = $_SESSION['login'];
include 'config/DbFunction.php';
$obj = new DbFunction();
$user = $obj->getuserinfo($table, $client);
$plan = $user->plan;
$limit = 10;
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>MsPe Api!</title>
  <script src="js/script.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php
if(isset($_GET['msg']))
    {
        $msg = $_GET['msg'];
        if($msg == 'error')
        {
        echo "<script>swal('Ohh!', '$msg', 'error')</script>";
        }
        elseif($msg == 'success')
        {
            $msg = "Updated Successfully!";
         echo "<script>swal('Success','$msg','success')</script>";   
        }
    }
    ?>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <div class="row justify-content-start">
        <div class="col-md-12 col-sm-12">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
          <span class="navbar-brand mb-0 mx-1 h1" href="#"><em>MsPe</em>.in</span>
        </div>
      </div>
      <div class="col-sm-12 col-md-10">
        <div class="row justify-content-end">
          <div class="col-md-2 col-sm-2">
            <ul class="navbar-nav">
              <li class="nav-item dropdown px-2">
                <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink4" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-user"></i> <?php echo $_SESSION['login'];?>
                </a>
                <ul class="dropdown-menu" style="position:absolute;" aria-labelledby="navbarDropdownMenuLink4">
                  <li> 
                 <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#profileModel" data-bs-whatever="@mdo">Profile</button></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <div class="collapse show" id="navbarToggleExternalContent">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container-fluid">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a class="nav-link text-white" href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="nav-item dropdown px-2">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-newspaper-o"></i> Reports
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
              <li><a class="dropdown-item" href="rchreport.php">Recharge Report</a></li>
              <li><a class="dropdown-item" href="walletrprt.php">Wallet Report</a></li>
            </ul>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link text-white" href="commission.php"><i class="fa fa-newspaper-o"></i> Commission</a>
          </li>
          <li class="nav-item dropdown px-2">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink5" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-rupee"></i> Plans
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink5">
              <li><a class="dropdown-item" href="#">Basic</a></li>
              <li><a class="dropdown-item" href="#">Starter</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown px-2">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-rupee"></i> Funds
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
              <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Request</button></li>
              <li><a class="dropdown-item" href="#">Pay via UPI</a></li>
              
            </ul>
          </li>
          <li class="nav-item dropdown px-2">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-gear"></i> Settings
            </a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
              <li><a class="dropdown-item" href="changepwd.php">Change Password</a></li>
              <li><a class="dropdown-item" href="apitoken.php">API Token</a></li>
              <li><a class="dropdown-item" href="ipsecurity.php">IP Security</a></li>
            </ul>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link text-white" target="_blank" href="doc/mpayapidoc.pdf"><i class="fa fa-book"></i> Api Documentation</a>
          </li>
        </ul>
      </div>
  </div>
  </nav>
  <br>

<!-- Vertically centered scrollable modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Payment Request</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="userfn.php">
            <div class="row mb-3">
                <div class="col-md-12">
                 
            <label for="bank" class="col-form-label">Choose Bank:</label>
            <select class="form-control" onchange="" name="bank" id="bank" required>
                <option value="">--Select Bank--</option>
                <option data-acc="4684984984">ICICI BANK</option>
                <option data-acc="1315466466">HDFC</option>
                </select>
          </div>
                </div>
                 <div class="row mb-3">
            <div class="col-md-6">
                    <label for="pmode" class="col-form-label">Payment Mode:</label>
                    <select  name="pmode" id="pmode"  class="form-control" required>
                      <option value="">--Select Pay Mode--</option>
                      <option>NEFT/IMPS/RTGS</option>
                      <option>Cash Deposit</option>
                      <option>UPI</option>
                </select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="trid" class="col-form-label">Transaction Id:</label>
                    <input type="text" name="trid" id="trid" class="form-control" required>
                </div>
            </div>
            <div class="row mb-3">
                 <div class="col-md-6">
                    <label for="amount" class="col-form-label">Amount:</label>
                    <input type="number" name="amount" id="amount" class="form-control">
                    <input type="hidden" name="client_id" class="form-control" value="<?php echo $client;?>" required>
                </div>
                 <div class="col-md-6">
                    <label for="pmode" class="col-form-label">Payment Date:</label>
                    <input type="date" name="date" id="pmode" class="form-control">
                    <input type="hidden" name="status" value="pending" required>
                </div>
            </div>
         
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="payrequest" class="btn btn-primary">Send Request</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Vertically centered scrollable modal -->
<div class="modal fade" id="profileModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div id="profiledata" class="modal-body">
     
        </div>
    </div>
  </div>
</div>

