<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="./css/style.css" rel="stylesheet">
    <title>crud</title>
</head>

<body>

    <!-- sing up form -->
    <?php
    session_start();
   

    ?>
        <main class="container d-flex vh-100 justify-content-center align-items-center">
            <div class="shadow bg-white  flex-column rounded w-50 d-flex justify-content-center align-items-center p-4">
                <h2 class="text-secondary fw-bold mb-5">Sign up</h2>
                <form class="w-100" method="post" action="/insert.php">
                    <div class="mb-3 w-100">
                        <label for="email" class="form-label fw-bold text-secondary">NAME</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                        <span class="text-danger">
                            <?php if (isset($_SESSION['singup']['name'])) {
                                    echo $_SESSION['singup']['name'];
                                }   
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 w-100">
                        <label for="email" class="form-label fw-bold text-secondary">FATHER NAME</label>
                        <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Father name">
                        <span class="text-danger">
                            <?php if (isset($_SESSION['singup']['f_name'])) {
                                    echo $_SESSION['singup']['f_name'];
                                }   
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 w-100">
                        <label for="email" class="form-label fw-bold text-secondary">Email address</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                        <span class="text-danger">
                            <?php if (isset($_SESSION['singup']['email'])) {
                                    echo $_SESSION['singup']['email'];
                                }   
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 w-100">
                        <label for="pass" class="form-label fw-bold text-secondary">PASSWORD</label>
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="password">
                        <span class="text-danger">
                            <?php if (isset($_SESSION['singup']['pass'])) {
                                    echo $_SESSION['singup']['pass'];
                                }   

                                session_unset();
                                session_destroy();
                            ?>
                        </span>
                    </div>
                    <div class="mb-3 w-100">
                        <input name="submit" value="Sign Up" type="submit" class="btn btn-primary fw-bold form-control">
                    </div>
                    <?php


                    ?>
                </form>


            </div>
        </main>
</body>

</html>