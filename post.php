<?php
    require('config/config.php');
    require('config/db.php');
    require('include/header.php');

    if(isset($_POST['delete'])){
        $delete_id=mysqli_real_escape_string($con,$_POST['delete_id']);
       

        $query="DELETE FROM posts WHERE id={$delete_id}";
        // die($q) prints the query
        if(mysqli_query($con,$query)){
            header('Location:index.php');
        }else {
           echo 'ERROR: '.mysqli_error($con);
        }
    }

    //get ID
    $id=mysqli_real_escape_string($con,$_GET['id']);

    // Create Query
    $query='SELECT * From posts WHERE id= '.$id;

    // Get Result
    $result=mysqli_query($con,$query);

    // Fetch data
    $post=mysqli_fetch_assoc($result);
    // var_dump($posts);
    // Free Result
    mysqli_free_result($result);

    // Close Connection
    mysqli_close($con);
?>
    <div class="container">
        <a href="<?php echo ROOT_URL;?>" class="btn btn-default">Back</a>
        <h1><?php echo $post['title'];?></h1>
            <small>Created on<?php echo $post['created_at'];?> by <?php echo $post['author'];?></small>
            <p><?php echo $post['body'];?></p>
            <hr>
            <form class="float-right" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input type="hidden" name="delete_id" value="<?php echo $post['id'];?>">
                <input type="submit" name="delete" value="Delete" class="btn btn-danger">
            </form>
            <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id'];?>" class="btn btn-default">Edit</a>

    </div>
<?php include('include/footer.php');?>