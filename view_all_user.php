<?php 
include ('header.php');
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Post</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
         

          <!-- Content Row -->

         

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
                        </div>
                        <div class="card-body">
                                <div class="row">

                                                    <?php 
                                                    $user_id = $_SESSION['user_id'];
                                                    $get_user = "SELECT * FROM users ";
                                                    $result_get_user = mysqli_query($connection,$get_user);
                                                    
                                                        while($row = mysqli_fetch_array($result_get_user))
                                                        {
                                                        $id = $row['id'];
                                                            $user_name = $row['user_name'];
                                                            $user_profile_photo = $row['user_profile_photo'];
                                                            

                                                            if($id != $user_id)
                                                            {

                                                            
                                                    

                                                
                                                    
                                                    ?>

                                                                <div class="col-lg-12" style="padding:25px">
                                                                    <div class="col-lg-6">
                                                                             <img width="150px" height="150px" class="rounded-circle img-profile" src="post_images/<?php echo $user_profile_photo; ?>" alt="">
                                                                             <b>
                                                                    User Name : <?php echo $user_name;?>
                                                                    <br>
                                                                    <br>
                                                                    <form method="POST" action="">
                                                                    

                                                                        <input type="hidden" name="friend_id" value="<?php echo $id;?>">
                                                                    <button type="submit" name="friend_request<?php echo $id; ?>" class="btn btn-primary">
                                                                        Send Request
                                                                    </button>
                                                                    </form>

                                                                    <?php 
                                                                    if(isset($_POST['friend_request'.$id]))
                                                                    {
                                                                         $friend_id = $_POST['friend_id'];
                                                                         $user_id = $_SESSION['user_id'];

                                                                         $insert_request = "INSERT INTO friend_request(from_id,to_id) VALUES('$user_id','$friend_id')";
                                                                         $result_insert = mysqli_query($connection,$insert_request);
                                                                         if($result_insert)
                                                                         {
                                                                             echo "friend reqeust send";
                                                                         }
                                                                         else
                                                                         {
                                                                             echo "Error".mysqli_error($connection);
                                                                         }




                                                                    }
                                                                    ?>
                                                                    </b>
                                                                    </div>
                                                                                
                                                                    
                                                                                
                                                                
                                                                </div>
                                                                <br>
                                                                <br>
                                                                
                                                    <?php
                                                            }
                                                        }
                                                
                                                        
                                                        ?>


                                                
                                </div>
                        
                        </div>
              </div>


              <!-- Color System -->
              <div class="row">
               
                 
            </div>

            </div>

           
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     
  <!-- End of Page Wrapper -->
  <?php 
include ('footer.php');
?>
 