<!-- Bootstrap css
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 Jquery css 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->


<?php
    // require('include/navbar.php');
    require('config/db.php');
    require('config/config.php');
    // Create Query
    $query='SELECT * From posts ORDER BY created_at DESC';

    // Get Result
    $result=mysqli_query($con,$query);

    // Fetch data
    $posts=mysqli_fetch_all($result,MYSQLI_ASSOC);
    // var_dump($posts);
    // Free Result
    mysqli_free_result($result);

    // Close Connection
    mysqli_close($con);
?>
<?php include('include/header.php');?>
<div class="container">
    <h1>Posts</h1>
    <?php foreach($posts as $post):?>
        <div clss="well">
            <h3><?php echo $post['title'];?></h3>
            <small>Created on<?php echo $post['created_at'];?> by <?php echo $post['author'];?></small>
            <p><?php echo $post['body'];?></p>
            <a class="btn btn-default" href="<?php echo ROOT_URL;?>post.php?id=<?php echo $post['id'];?>">Read More</a>
        </div>
    <?php endforeach;?>
</div>
<?php include('include/footer.php');?>
