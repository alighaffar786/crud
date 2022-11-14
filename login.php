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
    <main class="container d-flex flex-column vh-100 justify-content-center ">
        <?php
        session_start();
        if (isset($_SESSION['name'])) {
            echo "<div class='w-25 rounded  m-3 text-white fw-bold shadow p-3 bg-success'> Mr " . $_SESSION['name'] . " your are successfully signup please log in</div>";
            session_unset();
            session_destroy();
        }
        ?>


        <div class="shadow bg-white m-auto  flex-column rounded w-50 d-flex justify-content-center align-items-center p-4">
            <h2 class="text-secondary fw-bold mb-5">Login</h2>

            <form class="w-100" method="post" action="/condition.php">
                <div class="mb-3 w-100">
                    <label for="email" class="form-label fw-bold text-secondary">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <span class="text-danger">
                        <?php if (isset($_SESSION['login']['email'])) {
                            echo $_SESSION['login']['email'];
                        }
                        ?>
                    </span>
                </div>
                <div class="mb-3 w-100">
                    <label for="pass" class="form-label fw-bold text-secondary">PASSWORD</label>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="password">
                    <span class="text-danger">
                        <?php if (isset($_SESSION['login']['pass'])) {
                            echo $_SESSION['login']['pass'];
                        }

                       
                        ?>
                    </span>
                </div>
                <div class="mb-3 w-100">
                    <input name="submit" value="Log IN" type="submit" class="btn btn-primary fw-bold form-control">
                </div>
                <?php
                if (isset($_POST['submit'])) {
                   
                }
                ?>
                <span class="text-danger">
                        <?php if (isset($_SESSION['login']['error'])) {
                            echo $_SESSION['login']['error'];
                        }

                        session_unset();
                        session_destroy();
                        ?>
                </span>
            </form>
        </div>

    </main>
</body>

</html>