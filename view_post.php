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
                  <h6 class="m-0 font-weight-bold text-primary">My All Posts</h6>
                </div>
                <div class="card-body">
                <div class="row">

                    <?php 
                    $user_id = $_SESSION['user_id'];
                    $query_post = "SELECT * FROM posts WHERE user_id='$user_id' ";
                    $result_post = mysqli_query($connection,$query_post);
                    $num_rows = mysqli_num_rows($result_post);
                    if($num_rows>0)
                    {
                        while($row = mysqli_fetch_array($result_post))
                        {
                            $title = $row['post_title'];
                            $description = $row['post_description'];
                            $image = $row['post_image'];
                            $date = $row['post_date'];

                       

                   
                    
                    ?>

                                <div class="col-lg-12">
                                                <div class="row">
                                                            <div class="col-lg-4 ">

                                                                    <img width="300px" height="200px" src="post_images/<?php echo $image;?>" alt="">


                                                            </div>
                                                            <div class="col-lg-8 ">
                                                                        <br>
                                                                        <br>
                                                                        <h4>
                                                                        Post Title : <?php echo $title?>
                                                                        </h4>

                                                                        <p>
                                                                        Description : <?php echo $description?>
                                                                        </p>

                                                                        <p>
                                                                        Date : <?php echo $date?>
                                                                        </p>

                                                            </div>
                                                
                                                </div>
                                                
                                
                                </div>
                                
                    <?php
                        }
                    }
                    else
                    {
                        echo "Post Not Found !";
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
 