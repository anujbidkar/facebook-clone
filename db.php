<?php

global $connection;

$connection = mysqli_connect('localhost','root','','fb_clone');

if($connection)
{
    // echo "success";
}
else
{
    echo "Error in Connection";
}

?>