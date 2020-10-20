<?php
    require('config/db.php');
    require('config/config.php');
    include('include/header.php');
    if(isset($_POST['submit'])){
        $title=mysqli_real_escape_string($con,$_POST['title']);
        $body=mysqli_real_escape_string($con,$_POST['body']);
        $author=mysqli_real_escape_string($con,$_POST['author']);

        $q="INSERT INTO posts (`title`,`body`,`author`) VALUES('$title','$body','$author')";
        if(mysqli_query($con,$q)){
            header('Location:index.php');
        }else {
           echo 'ERROR: '.mysqli_error($con);
        }
    }
?>
<div class="container">
    <h1>Add Posts</h1>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label>Author</label>
        <input type="text" name="author" class="form-control">
    </div>
    <div class="form-group">
        <label>Body</label>
        <textarea name="body" class="form-control"></textarea>
    </div>
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
    </form>
</div>
<?php include('include/footer.php');?>
