<?php
session_start();
if(isset($_SESSION['user']))
{
  header('location:home.php');

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Login, Registration & Forgot Form Design</title>
    <!-- Bootstrap 4 CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Fontawesome CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body class="bg-info">
    <div class="container">
      <!-- Login Form Start -->
      <div class="row justify-content-center wrapper" id="login-box">
        <div class="col-lg-10 my-auto myShadow">
          <div class="row">
            <div class="col-lg-7 bg-white p-4">
              <h1 class="text-center font-weight-bold text-primary">Welcome</h1>
              <hr class="my-3" />
              <form action="#" method="post" class="px-3" id="login-form">
              <div id="loginAlert"></div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                  </div>
                  <input type="text" id="email" name="email" class="form-control rounded-0" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>" placeholder="Citizen-Id" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>"name="password" class="form-control rounded-0" minlength="5" placeholder="Password" required autocomplete="off" />
                </div>
                <div class="form-group clearfix">
                  <div class="custom-control custom-checkbox float-left">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="rem" <?php if(isset($_COOKIE['email'])){?>checked<?php }?>/>
                    <label class="custom-control-label" for="customCheck">Remember me</label>
                  </div>
                  <div class="forgot float-right">
                    <!-- <a href="#" id="forgot-link">Forgot Password?</a> -->
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" id="login-btn" value="Sign In" class="btn btn-primary btn-lg btn-block myBtn" />
                </div>
              </form>
            </div>
            <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
              <h1 class="text-center font-weight-bold text-white">Municipal Corporation</h1>
              <hr class="my-3 bg-light myHr" />
              <p class="text-center font-weight-bolder text-light lead">Enter your personal details and Contribute towards betterment of the City</p>
              <button class="btn btn-outline-light btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign Up</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Login Form End -->
      <!-- Registration Form Start -->
      <div class="row justify-content-center wrapper" id="register-box" style="display: none;">
        <div class="col-lg-10 my-auto myShadow">
          <div class="row">
            <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
              <h1 class="text-center font-weight-bold text-white">Welcome </h1>
              <hr class="my-4 bg-light myHr" />
              <p class="text-center font-weight-bolder text-light lead">To keep connected with us please login with your personal info.</p>
              <button class="btn btn-outline-light btn-lg font-weight-bolder mt-4 align-self-center myLinkBtn" id="login-link">Sign In</button>
            </div>
            <div class="col-lg-7 bg-white p-4">
              <h1 class="text-center font-weight-bold text-primary">Create Account</h1>
              <hr class="my-3" />
              <form action="#" method="post" class="px-3" enctype="multipart/form-data" id="register-form">
              <div id="regAlert"></div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-user fa-lg fa-fw"></i></span>
                  </div>
                  <input type="text" id="name" name="name" class="form-control rounded-0" placeholder="Full Name" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg fa-fw"></i></span>
                  </div>
                  <input type="email" id="remail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><img src="https://cdn2.iconfinder.com/data/icons/soleicons-line-vol-2/64/aadhaar_aadhar_card_driving_id_license-512.png" height="40" width="40"></span>
                  </div>
                  <input type="number" id="aadno" name="aadno" class="form-control rounded-0" placeholder="Aadhar Number" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="rpassword" name="password" class="form-control rounded-0" minlength="5" placeholder="Password" required />
                </div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
                  </div>
                  <input type="password" id="cpassword" name="cpassword" class="form-control rounded-0" minlength="5" placeholder="Confirm Password" required />
                </div>
                <div class="form-group">
                  <div id="passError" class="text-danger font-weight-bolder"></div>
                </div>
                <div class="form-group">
                  <input type="submit" id="register-btn" value="Sign Up" class="btn btn-primary btn-lg btn-block myBtn" />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Registration Form End -->
      <!-- Forgot Password Form Start -->
      <div class="row justify-content-center wrapper" id="forgot-box" style="display: none;">
        <div class="col-lg-10 my-auto myShadow">
          <div class="row">
            <div class="col-lg-7 bg-white p-4">
              <h1 class="text-center font-weight-bold text-primary">Forgot Your Password?</h1>
              <hr class="my-3" />
              <p class="lead text-center text-secondary">To reset your password, enter the registered e-mail adddress and we will send you password reset instructions on your e-mail!</p>
              <form action="#" method="post" class="px-3" id="forgot-form">
                <div id="forgotAlert"></div>
                <div class="input-group input-group-lg form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg"></i></span>
                  </div>
                  <input type="email" id="femail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
                </div>
                <div class="form-group">
                  <input type="submit" id="forgot-btn" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn" />
                </div>
              </form>
            </div>
            <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
              <h1 class="text-center font-weight-bold text-white">Reset Password!</h1>
              <hr class="my-4 bg-light myHr" />
              <button class="btn btn-outline-light btn-lg font-weight-bolder myLinkBtn align-self-center" id="back-link">Back</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Forgot Password Form End -->
    </div>
    <!-- jQuery CDN -->
    <script
     src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
     crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
  </body>
</html>