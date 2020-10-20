<?php
    require('config/db.php');
    require('config/config.php');
    if(isset($_POST['submit'])){
        $update_id=mysqli_real_escape_string($con,$_POST['update_id']);
        $title=mysqli_real_escape_string($con,$_POST['title']);
        $body=mysqli_real_escape_string($con,$_POST['body']);
        $author=mysqli_real_escape_string($con,$_POST['author']);

        $query="UPDATE posts SET 
            title='$title',
            author='$author',
            body='$body' WHERE id={$update_id}";
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

include('include/header.php');?>
<div class="container">
    <h1>Add Posts</h1>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="<?php echo $post['title'];?>">
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" name="author" class="form-control" value="<?php echo $post['author'];?>">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea name="body" class="form-control" value="<?php echo $post['body'];?>"></textarea>
    </div>
    <input type="hidden" name="update_id" value="<?php echo $post['id'];?>">
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<?php include('include/footer.php');?>
