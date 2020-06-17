<?php include "../partials/header.php" ?>
<?php include "../partials/navbar.php" ?>

<body class="bg-gradient-primary">
</br></br>
  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
               <div class="row">
                  <div class="col-sm-2">
                      <p>       Country:</p>
                  </div>
                  <div>
                    <select style="border:1px solid black;">
                      <?php
                        include "CountryModel.php";

                        foreach($countries as $key => $value) {
                      ?>
                      <option value="<?= $key ?>" title="<?= htmlspecialchars($value)?>" >

    <!--icon for flag but option include text only, if you can resolve it, for example:you can Compensate for (eg) by any key of country !-->
                      <div class="flag flag-eg"></div>

                      <?=htmlspecialchars($value)?>
                      
                      </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                </br>
                <a href="" class="btn btn-primary btn-user btn-block">
                  Register Account
                </a>
              </form>
              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</body>
<?php require "../partials/footer.php" ?>


