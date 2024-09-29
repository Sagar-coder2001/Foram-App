<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Foram App!</title>
</head>

<body>
    <?php
     require 'Partials/_header.php'; 
     ?>

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://plus.unsplash.com/premium_photo-1661963212517-830bbb7d76fc?q=80&w=1386&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                width=100% height=400px>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                width=100% height=400px>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1488229297570-58520851e868?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                width=100% height=400px>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- cards goes here  -->
    <div class="container text-center">
        <h2 class="my-2">Welocome to the cards</h2>
        <div class="row">

        <!-- for loop to iterate the cards  -->

        <?php
        require "Partials/db_connect.php";
        $sql = " SELECT * FROM `foramtable` ";
        $result = mysqli_query($conn , $sql);
        while($row = mysqli_fetch_assoc($result)){
            // echo $row['category_id'];
            // echo $row['category_name'];
            $catid = $row['category_id'];
            $catname = $row['category_name'];
            $catdesc = $row['category_desc'];
            echo '<div class="col-md-4 my-2">
                    <div class="card m-3" style="width: 18rem">
                    <img src="https://images.unsplash.com/photo-1488229297570-58520851e868?q=80&w=1469&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top">
                    <div class="card-body">
                    <h5 class="card-title"><a href="thread.php?catid=' . $catid . ' ">'. $catname . '</a></h5>
                    <p class="card-text">' . substr($catdesc, 0 , 70). '.....</p>
                    </div>
                    <h5 class="card-title"><a href="thread.php?catid=' . $catid . ' "><button class="btn btn-info">Thread</button></a></h5>
                 </div>
                 </div>';
        }
        ?>
        </div>
        </div>

        
          <?php include 'Partials/foter.php'; ?>

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