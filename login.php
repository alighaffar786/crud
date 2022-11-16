<?php 
    require "header.php";
?> 
        <?php
        if (isset($_SESSION['name'])) {
            echo "<div class='w-25 rounded  m-3 text-white fw-bold shadow p-3 bg-success'> Mr " . $_SESSION['name'] . " your are successfully signup please log in</div>";
            unset($_SESSION['name']);
        }
        ?>


        <div class="shadow bg-white m-auto  flex-column rounded w-50 d-flex justify-content-center align-items-center p-4">
            <h2 class="text-secondary fw-bold mb-5">Login</h2>

            <form class="w-100" method="post" action="/condition.php">
                <div class="mb-3 w-100">
                    <label for="email" class="form-label fw-bold text-secondary">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
                    <span class="text-danger">
                        <?php if (isset($_SESSION['field']['email'])) {
                            echo $_SESSION['field']['email'];
                        }
                        ?>
                    </span>
                </div>
                <div class="mb-3 w-100">
                    <label for="pass" class="form-label fw-bold text-secondary">PASSWORD</label>
                    <input type="password" class="form-control" name="pass" id="pass" placeholder="password">
                    <span class="text-danger">
                        <?php if (isset($_SESSION['field']['pass'])) {
                            echo $_SESSION['field']['pass'];
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
                        <?php if (isset($_SESSION['field']['error'])) {
                            echo $_SESSION['field']['error'];
                        }

                        session_unset();
                        session_destroy();
                        ?>
                </span>
            </form>
        </div>

<?php 
    require "footer.php";
?> 