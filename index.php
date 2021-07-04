

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Welcome to MsPe. Mobile, DTH, DataCard, All Recharges API services is available at free of cost. Register Now."/>
  <meta name="keywords" content="MSPE Api, Recharge Api, Free Recharge Software, Free Mobile Recharge Api, Free Recgarge Api, High Commission API"/>
  <meta name="robots" content="index,follow"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>MsPe Api!</title>
</head>

<body>

  <style>
  
	#dashboard{
	   display:block;
	}
    #register {
      display: none;
    }

    #login {
      display: none;
    }

    #forget {
      display: none;
    }

    #intro {
      background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
      height: 100vh;
    }

    /* Height for devices larger than 576px */
    @media (min-width: 992px) {
      #intro {
        margin-top: -58.59px;
      }
    }
  </style>
  <?php
if(isset($_GET['msg']))
    {
        $msg = $_GET['msg'];
        if($msg == 'duplicate')
        {
            $msg = "Mobile or Email Already Registered With us.";
        echo "<script>swal('Ohh!', '$msg', 'error')</script>";
        }
        elseif($msg == 'success')
        {
            $msg = "Registered Successfully. Credentials will be sent on email.";
         echo "<script>swal('Success','$msg','success')</script>";   
        }
    }?>
  <nav class="navbar navbar-expand-lg bg-body">
    <div class="col-md-8">
      <h4 class="text-dark ms-5">MsPe Api</h4>
    </div>
    <div class="col-md-4 btn-group ">
      <a href="#" onclick="login()" class="btn btn-primary border border-light rounded" aria-current="page">Login</a>
      <a href="#" onclick="register()" class="btn btn-primary border border-light rounded">Register</a>
      <a href="#" onclick="forget()" class="btn btn-primary border border-light rounded">Forget Password</a>
    </div>
  </nav>
  <br>
  <!-- Background image -->
  <div id="intro" class="bg-image shadow-2-strong">
    <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <!-----Dashboard Content ------->
    <div id="dashboard" class="container">
        <div class="row justify-content-center mt-3" >
        <div class="col-xl-8 col-md-12 col-sm-12">
            <h1 class="text-white center"><em>Welcome to MsPe.</em></h1>
          <h1 class="text-white"><em>Mobile.</em></h1>
        <h2 class="text-white"><em>DTH.</em></h2>
        <h3 class="text-white"><em>DataCard.</em></h3>
        <h3 class="text-white"><em>All Recharges API services is available at free of cost.</em></h3>
         <h1 class="text-white"><em>Register Now.</em></h1>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12">
            
        </div>
      </div>
      </div>
      <!-----Dashboard Content ------->
      <!----Login ------->
      <div id="login" class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-md-8">
              <div class="col-md-12 col-sm-12">
                <h4 class="text-white center">Login</h4>
            </div>
            <form class="bg-white rounded shadow-5-strong p-5" method="POST" action="userfn.php">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="userid" id="form1Example1" class="form-control" />
                <label class="form-label" for="form1Example1">User Id</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2">Password</label>
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label" for="form1Example3">
                      Remember me
                    </label>
                  </div>
                </div>

                <div class="col text-center">
                  <!-- Simple link -->
                  <a href="#!">Forgot password?</a>
                </div>
              </div>

              <!-- Submit button -->
              <button type="submit" name="login" class="btn btn-primary btn-block">Sign in</button>
            </form>
          </div>
        </div>
      </div>
      <!------login ---->
      <!-----Register ------->
      <div id="register" class="container">
        <div class="row justify-content-center mt-5" >
          <div class="col-xl-5 col-md-8">
              <div class="col-md-12 col-sm-12">
                <h4 class="text-white center">Register </h4>
            </div>
            <form class="bg-white rounded shadow-5-strong p-5" action="userfn.php" method="POST">
               <!-- Name input -->
               <div class="form-outline mb-4">
                <input type="text" id="form1Example1" name="name" class="form-control" />
                <label class="form-label" for="form1Example1">Full Name</label>
              </div>
               <!-- Mobile input -->
               <div class="form-outline mb-4">
                <input type="number" id="form1Example1" name="mobile" class="form-control" />
                <label class="form-label" for="form1Example1">Mobile</label>
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form1Example1" name="email" class="form-control" />
                <label class="form-label" for="form1Example1">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form1Example2" name="password" class="form-control" />
                <label class="form-label" for="form1Example2">Password</label>
              </div>

              <!-- 2 column grid layout for inline styling -->
              <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                  <!-- Checkbox -->
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                    <label class="form-check-label" for="form1Example3"><a href="#">
                      Terms & Conditions</a>
                    </label>
                  </div>
                </div>

                <div class="col text-center">
                  <!-- Simple link -->
                  <a href="#!">Already Registered?</a>
                </div>
              </div>

              <!-- Submit button -->
              <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
            </form>
          </div>
        </div>
      </div>
      <!-----Register ------->
      
      <!-----Forget ------->
      <div id="forget" class="container">
        <div class="row justify-content-center mt-5" >
        <div class="col-xl-5 col-md-8">
            <div class="col-md-12 col-sm-12">
                <h4 class="text-white center">Forget Password</h4>
            </div>
            <form class="bg-white rounded shadow-5-strong p-5" action="#" method="POST">
               <!-- Mobile input -->
               <div class="form-outline mb-4">
                <input type="number" id="form1Example1" name="mobile" class="form-control" />
                <label class="form-label" for="form1Example1">Mobile</label>
              </div>
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form1Example1" name="email" class="form-control" />
                <label class="form-label" for="form1Example1">Email address</label>
              </div>

              <!-- Submit button -->
              <button type="submit" name="forget" class="btn btn-primary btn-block">Send Verification Link</button>
            </form>
          
          
        </div>
      </div>
      <!-----Forget ------->
    </div>
  </div>




  <!----- Contact Info ------->
  <div class="container">
    <div class="row justify-content-center  p-3 mb-5 bg-body rounded">
      <div class="col-md-3 col-sm-12 ">
        <a class="nav-link text-primary h5"><i class="fa fa-phone"></i> 8709673993</a>
      </div>
      <div class="col-md-3 col-sm-12">
        <a class="nav-link text-info h5"><i class="fa fa-envelope"></i> contact@mspe.in</a>
      </div>
      <div class="col-md-3 col-sm-12">
        <a class="nav-link text-success h5"><i class="fa fa-whatsapp"></i> 8709673993</a>
      </div>
    </div>
  </div>
  <!-- Footer-->
  <footer class="bg-light text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fa fa-facebook"></i></a>

        <!-- Twitter -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fa fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fa fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fa fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fa fa-linkedin"></i></a>
        <!-- Github -->
        <a class="btn btn-primary btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i class="fa fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3 container-fluid" style="background-color: rgba(0, 0, 0, 0.2);">
        <div class="row justify-content-center">
            
        <div class="col-md-4"><a class="text-white" href="#">Privacy Policy</a></div>
        <div class="col-md-4">
      © 2021 Copyright:
      <a class="text-white" href="https://mspe.in/">MsPe.in</a>
      </div>
      <div class="col-md-4"><a class="text-white" href="#">Terms & Conditions</a></div>
      </div>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- /Footer-->

  <script type="text/javascript">
    function login() {
      document.getElementById("login").style.display = "block";
      document.getElementById("dashboard").style.display = "none";
      document.getElementById("register").style.display = "none";
      document.getElementById("forget").style.display = "none";
    }

    function register() {
      document.getElementById("login").style.display = "none";
      document.getElementById("dashboard").style.display = "none";
      document.getElementById("register").style.display = "block";
      document.getElementById("forget").style.display = "none";
    }

    function forget() {
      document.getElementById("login").style.display = "none";
      document.getElementById("dashboard").style.display = "none";
      document.getElementById("register").style.display = "none";
      document.getElementById("forget").style.display = "block";
    }
  </script>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>