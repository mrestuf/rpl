<?php
session_start();
include('lib/template.php');
?>



<!DOCTYPE html>
<html style="font-size: 16px;">

<head>
  <title> PoS-K </title>
  <link rel="icon" href="logo.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
  <section class="vh-100 gradient-custom">
    <form action="login.php?op=in" method="POST">
      <div class="bg-image" style="background-image: url('bg.jpg'); height: 100vh; ">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                  <div class="mb-md-5 mt-md-4 pb-3">
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-white-50 mb-5">Please enter your username and password</p>
                    <div class="form-outline form-white mb-4">
                      <input type="text" name="username" id="username" class="form-control form-control-lg" />
                      <label class="form-label" for="username">Username</label>
                    </div>
                    <div class="form-outline form-white mb-4">
                      <input type="password" name="password" id="password" class="form-control form-control-lg" />
                      <label class="form-label" for="password">Password</label>
                    </div>
                    <button class="btn btn-outline-light btn-lg px-5" type="submit" name="submit" value="LOGIN">Login</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</body>

</html>