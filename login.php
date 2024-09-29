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
    <?php 
        require 'Partials/_header.php';
    ?>
    
    <div class="mask d-flex align-items-center h-70 gradient-custom-3 p-2">
        <div class="container h-70">
            <div class="row d-flex justify-content-center align-items-center h-70">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-3">
                            <h2 class="text-uppercase text-center mb-2">Login</h2>

                            <form action="/MyPhp/Foram-app/Partials/handlelogin.php" method="POST">

                                <div data-mdb-input-init class="form-outline mb-2">
                                    <input type="text" name="name" id="name" class="form-control form-control-lg" />
                                    <label class="form-label" for="name">Your Name</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-2">
                                    <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                    <label class="form-label" for="email">Your Email</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-2">
                                    <input type="password" id="password" name="password"
                                        class="form-control form-control-lg" />
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-3">
                                    <input class="form-check-input me-2" type="checkbox" value=""
                                        id="form2Example3cg" />
                                    <label class="form-check-label" for="form2Example3g">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                service</u></a>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success">Login</button>
                                </div>

                                <p class="text-center text-muted mt-1 mb-0">Dont Have An Account? <a href="signup.php"
                                        class="fw-bold text-body"><u>Register here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        require 'Partials/foter.php';
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