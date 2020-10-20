<?php 
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Facebook Clone</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form action="" method="POST" class="user">
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input required type="text" class="form-control form-control-user" id="exampleFirstName" name="user_name" placeholder="Enter Name">
                  </div>
                 
                </div>
                <div class="form-group">
                  <input required type="email" class="form-control form-control-user" id="exampleInputEmail"  name="user_email" placeholder="Enter Email">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input required type="password" class="form-control form-control-user" id="exampleInputPassword" name="user_password"  onchange="my_function()" placeholder="Enter Password">
                  </div>
                  <div class="col-sm-6">
                    <input required type="password" class="form-control form-control-user" id="exampleRepeatPassword" id="c_password" onchange="my_function()" placeholder="Confirm Password">
                  </div>
                  <script>
                    
                    function my_function()
                    {
                      var password = document.getElementById("exampleInputPassword").value;
                      var c_password = document.getElementById("exampleRepeatPassword").value;
                     
                      if(password === c_password)
                      {
                        document.getElementById("r_id").removeAttribute("disabled");
                      }
                      else
                      {
                        document.getElementById("r_id").setAttribute("disabled", "disabled"); 

                      }
                      
                    }

                  </script>
                </div>
                <button disabled id="r_id" type="submit" name="create_account"    class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
                
              </form>
              <?php
              if(isset($_POST['create_account']))
              {
                $user_name = $_POST['user_name'];
                $user_email =$_POST['user_email'];
                $user_password = $_POST['user_password'];


                $query_check = "SELECT * FROM users WHERE user_email='$user_email'";
                $result_query_check = mysqli_query($connection,$query_check);

                if($result_query_check)
                {
                  $rows = mysqli_num_rows($result_query_check);
                  if($rows == 0)
                  {
                        $insert = "INSERT INTO users(user_name,user_email,user_password) VALUES('$user_name','$user_email','$user_password') ";
                        $result = mysqli_query($connection,$insert);
                        if($result)
                        {
                          echo "<script>alert('User Register Successfully')</script>";
                        }
                        else
                        {
                          echo "Error :".mysqli_error($connection);
                        }

                  }
                  else
                  {
                    echo "<script>alert('Email Id Already Exisist')</script>";

                  }


                }
                else
                {
                  echo "error in".mysqli_error($connection);
                }
               
               
               
               
               
               
               
               
               
              }

              ?>
              <hr>
              
              <div class="text-center">
                <a class="small" href="index.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
