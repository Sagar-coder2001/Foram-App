<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <?php require 'Partials/_header.php'; ?>
    <?php require 'Partials/db_connect.php'; ?>

    <div class="container my-4">

    <?php
    $cid = $_GET['thread_id'];
    $sql = "SELECT * FROM thread WHERE thread_id = $cid " ;
    $result = mysqli_query($conn , $sql);
    $noResult = true;
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $noResult = false;

        $sql3 = "SELECT * FROM users WHERE user_id = '$cid' ";
        $result3 = mysqli_query($conn , $sql3);
        $row3 = mysqli_fetch_assoc($result3);

        echo '<div class="media my-3 border border-success p-3 ">
            <div class="media-body">
                <img src="https://images.unsplash.com/photo-1488229297570-58520851e868?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    width=30px height=30px border-radius=50%>
                <h5 class="mt-0 d-inline"><a class="fs-3 p-3 " href="threaditem.php?threadid=' . $cid . ' ">' . $title . '</a></h5>
                <h4 class="p-2">' . $desc . '</h4>
                <p>Posted by : <b> sagar shinde</b></p>
                </div>
        </div>';
    }

    if($noResult === true){
        echo '<div class="jumbotron jumbotron-fluid">
                <div class="container">
                <h2 class="display-4">No Result Found.</h2>
                <h4>be the first person to ask a question.</h4>
            </div>
        </div>';
    }

    ?>
    </div>


    <div class="container">

<!-- comment inserted -->
    <?php
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST"){
        $comment = $_POST['comment'];
        $user_id = $_POST['userid'];
        $sql = "INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_time`, `comment_by`) VALUES ('$comment', '$cid', current_timestamp(), '$user_id');";
        $result = mysqli_query($conn , $sql);
        if($result){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong>success!</strong> Your Comment has been inserted succesfully!
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            ';
        }
} 
?>
</div>


<div class="container">

<?php
   if(!isset($_SESSION['loggedin'])){
    echo "You are Not Logged Plase go to Logged in to start a question";
}
else{
    echo '<form action=" '. $_SERVER["REQUEST_URI"] . '" method="POST">
            <div class="mb-3">
                <label for="comment" class="form-label">Type Your Comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="2" Required></textarea>
                <input type="hidden" name="userid" value ="'. $_SESSION['user_id'] .'">


            </div>
            <div class="mb-3">
                <button class="btn btn-outline-success">Submit</button>
            </div>
        </form>';
}
?>
</div>

<div class="container border border-dark">
<h2>Discussion. </h2>

    <?php
        $id = $_GET['thread_id'];
        $sql = "SELECT * FROM comment WHERE thread_id = $id " ;
        $result = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_assoc($result)){
        $title = $row['comment_content'];
        $cid = $row['comment_id'];
        $cid = $row['comment_by'];

        $sql2 = "SELECT * FROM users WHERE user_id = '$cid' ";
        $result2 = mysqli_query($conn , $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        echo '<div class="media my-3 ">
            <div class="media-body d-flex justify-content-space-around p-2 position-relative">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxw0eitGgbS6Y3kJODK5lGbWxUV8sONkQUZg&s"
                    width=30px height=30px border-radius=50%>
               <p style="margin-left: 10px; margin-right:220px"> ' . $title . ' <p>
               <p class="position-absolute" style="right: 10px; margin-left:30px"> Written by :<b>' .$row2['user_name']. ' </b>
             </div>
        </div>
        <hr>
        
        ';
    }
    ?>
</div>

    <?php

    include 'Partials/foter.php';

    ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
