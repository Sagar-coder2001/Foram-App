<?php
     $showalert = false;
     if($_SERVER["REQUEST_METHOD"] == "POST"){
     require "db_connect.php";
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $user_id = $_POST['user_id'];
        $sql = "SELECT * FROM users WHERE user_email = '$email' AND user_password = '$password'";
        $result = mysqli_query($conn, $sql);
        $numexistrow = mysqli_num_rows($result);
        if ($numexistrow == 1){
            $row = mysqli_fetch_assoc($result);
            $user_id =  $row['user_id'];
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_id'] = $user_id;
            header("Location: /MyPhp/Foram-app/index.php");
            exit();
        } else {
            $showalert = false;
        }
    }
?>
<?php
if($showalert == false){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong>Invalid Credentials...
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>