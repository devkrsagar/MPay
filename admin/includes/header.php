<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mpay API!</title>
     <script src="js/script.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><em><b>MPay</b></em></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="operator.php">Operator</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Client Panel
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Add New</a></li>
            <li><a class="dropdown-item" href="clients.php">Recent Clients</a></li>
            <li><a class="dropdown-item" href="#">Client Report</a></li>
           
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Report
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="rchreport.php">Recharge Report</a></li>
            <li><a class="dropdown-item" href="#">AEPS Report</a></li>
            <li><hr class="dropdown-divider"></li>
            
            <li><a class="dropdown-item" href="#">Wallet Report</a></li>
            
          </ul>
        </li>
        
         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Funds
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="fundreq.php">Request</a></li>
            <li><a class="dropdown-item" href="fundreport.php">Report</a></li>
             <li><hr class="dropdown-divider"></li>
             <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Credit / Debit </button></li>
            <li><a class="dropdown-item" href="adwallet.php">Admin Wallet</a></li>
            
          </ul>
        </li>
        
        
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<!-- Vertically centered scrollable modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Wallet Management</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="adminfn.php">
          
                 <div class="row mb-3">
            <div class="col-md-6">
                    <label for="pmode" class="col-form-label">Payment Type:</label>
                    <select  name="type" id="pmode"  class="form-control" required>
                      <option value="">--Select Pay Type--</option>
    
                      <option>Debit</option>
                      <option>Credit</option>
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
                    <input type="hidden" name="adlogin" class="form-control" value="<?php echo $_SESSION['adlogin'];?>" required>
                </div>
            </div>
         
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="adminfund" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
