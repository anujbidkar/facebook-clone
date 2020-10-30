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
                  <h6 class="m-0 font-weight-bold text-primary">Add Project</h6>
                </div>
                <div class="card-body">
                <div class="form-group">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label for="">Post Title</label>
                    <input placeholder="Enter Post Title" required type="text" name="post_title" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Post Description</label>
                    <textarea name="post_description" class="form-control" id="" cols="30" rows="5">Enter Your Description
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="">Post Image</label>
                    <input  required type="file" name="fileToUpload" class="form-control" id="">
                </div>
                 
                <div class="form-group">
                    <label for="">Post Date</label>
                    <input  required type="date" name="post_date" class="form-control" id="">
                </div>
                <div class="form-group">
                    <input   type="submit" name="add_post_btn" value="Add Post" class="btn btn-primary" id="">
                </div>
                </form>
                <?php 
                
                if(isset($_POST['add_post_btn']))
                {
                    $title = $_POST['post_title'];
                    $post_description = $_POST['post_description'];
                    $post_date = $_POST['post_date'];
                    $user_id = $_SESSION['user_id'];

                    $target_dir = "post_images/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                   
                    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
                    {
                      
                    } else {
                      echo "error";
                    }
                    $file_name = $_FILES["fileToUpload"]["name"];


                    $insert_query = "INSERT INTO posts(user_id,post_title,post_description,post_image,post_date) VALUES('$user_id','$title','$post_description','$file_name','$post_date')";
                    $result_insert_post = mysqli_query($connection,$insert_query);
                    if($result_insert_post)
                    {
                        echo "insered";
                    }
                    else
                    {
                        echo "Error :".mysqli_error($connection);
                    }

                }
                
                ?>
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
 