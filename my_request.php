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
                                                    $get_user = "SELECT * FROM  friend_request WHERE to_id = '$user_id' ";
                                                    $result_get_user = mysqli_query($connection,$get_user);
                                                    $num_rows = mysqli_num_rows($result_get_user);
                                                    
                                                        while($row = mysqli_fetch_array($result_get_user))
                                                        {
                                                            // $id = $row['id'];
                                                            $from_id = $row['from_id'];
                                                            $id = $row['id'];
                                                            $status = $row['status'];

                                                            $get_name = "SELECT * FROM users WHERE id = '$from_id'";
                                                            $result_get_name = mysqli_query($connection,$get_name);

                                                            while($row2 = mysqli_fetch_array($result_get_name))
                                                            {
                                                              $user_name = $row2['user_name'];

                                                            }


                                                           
    
                                                
                                                    
                                                    ?>

                                                                <div class="col-lg-12" style="padding:25px">
                                                                    <div class="col-lg-6">
                                                                             <img width="150px" height="150px" class="rounded-circle img-profile" src="post_images/<?php echo $user_profile_photo; ?>" alt="">
                                                                             <b>
                                                                    User Name : <?php echo $user_name;?>
                                                                    <br>
                                                                    <br>
                                                                    <form method="POST" action="">
                                                                    

                                                                        <input type="hidden" name="id" value="<?php echo $id;?>">
                                                                        <?php 
                                                                        if($status == "accepted")
                                                                        {
                                                                          echo "Friend";
                                                                        }
                                                                        else
                                                                        {
                                                                          ?>
                                                                           <button type="submit" name="friend_request<?php echo $id; ?>" class="btn btn-primary">
                                                                        Accept Request
                                                                    </button>

                                                                          <?php
                                                                        }
                                                                        
                                                                        ?>
                                                                   
                                                                    </form>

                                                                    <?php 
                                                                    if(isset($_POST['friend_request'.$id]))
                                                                    {
                                                                      $id = $_POST['id'];

                                                                      $update_query = "UPDATE friend_request SET status='accepted' WHERE id='$id' ";
                                                                        
                                                                        //  $ = "INSERT INTO friend_request(from_id,to_id) VALUES('$user_id','$friend_id')";
                                                                         $result_update_query = mysqli_query($connection,$update_query);
                                                                         if($result_update_query)
                                                                         {
                                                                             echo "friend reqeust Accepted";
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
 