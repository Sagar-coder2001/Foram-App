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

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM foramtable WHERE category_id = $id " ;
    $result = mysqli_query($conn , $sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_desc'];
    }
    ?>

    <!-- insert the thread in database -->
        <?php

        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST"){
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $user_id = $_POST['userid'];
        $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$user_id', current_timestamp())";
        $result = mysqli_query($conn , $sql);
        if ($result) {

        } else {
            echo "Your data was not submitted successfully";
        }
} 
?>

    <!-- category containor start here  -->
    <div class="container my-4">
        <div class="jumbotron border border-dark text-center p-2">
            <h2 class="display-5">Welcome to <?php echo $catname ?> Foram</h2>
            <p class="lead"><?php echo $catdesc ?> </p>
            <hr class="my-4">
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, minus.</p>
            <a href="" class="btn btn-info">Learn More</a>
        </div>
    </div>


    <div class="container">
        <h2>start a Question </h2>

        <?php
        if(!isset($_SESSION['loggedin'])){
            echo "You are Not Logged in Plase go to Logged in to start a question";
        }
        else{
            echo '<form action=" '. $_SERVER["REQUEST_URI"] . '" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">problem title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="title">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Elleborate your concren</label>
                <textarea class="form-control" id="desc" name="desc" rows="2"></textarea>
                <input type="hidden" name="userid" value ="'. $_SESSION['user_id'] .'">
            </div>
            <div class="mb-3">
                <button class="btn btn-outline-success">Submit</button>
            </div>
        </form>';
        }
        ?>
        </div>
    
        <div class="container border border-dark p-2">
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM thread WHERE thread_cat_id = $id " ;
        $result = mysqli_query($conn , $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
        $noResult = false;
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $uid = $row['thread_user_id'];
        $cid = $row['thread_id'];

        $sql2 = "SELECT * FROM users WHERE user_id = '$uid' ";
        $result2 = mysqli_query($conn , $sql2);
        $row2 = mysqli_fetch_assoc($result2);

        echo '<div class="media my-3">
            <div class="media-body d-flex position-relative">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxw0eitGgbS6Y3kJODK5lGbWxUV8sONkQUZg&s"
                    width=30px height=30px border-radius=50%>
                <h5 class="mt-0 pl-2" style="margin-left:10px"><a href="threaditem.php?thread_id=' . $cid . '">' . $title . '</a></h5>
                <p class="position-absolute" style="right: 10px;">Writter by :     <b>'. $row2['user_name'] . ' </b> </p>
                </div>
                <p>' . $desc . ' </p>
                <hr>
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

    <!-- footer start here -->

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