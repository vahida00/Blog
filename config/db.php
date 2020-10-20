<?php
    // php and mysqli configuration
    $con=mysqli_connect('localhost','root','','phpblog');
    if(mysqli_connect_errno()){
        // echo "connection failed".mysqli_connect_errno();
    }
    else{
        // echo "connected";
    }

?>

