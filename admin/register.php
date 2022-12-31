<?php

include 'includes/Helper/Connection.php';
include 'includes/partials/header.php';
//include 'includes/helper/Sanitizer.php';
include 'includes/Helper/AutoLoader.php';
include 'includes/Helper/Error.php';

/**
 * Creating object of Account Model Class.
 */

$account = new Model\Account($con);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = Helper\Sanitizer::name($_POST['name']);
    $email = Helper\Sanitizer::email($_POST['email']);
    $username = Helper\Sanitizer::username($_POST['username']);
    $password = Helper\Sanitizer::password($_POST['password']);
    $confirmpassword = Helper\Sanitizer::password($_POST['confirmpassword']);


    //$account->validateName($name);
    // $account->validateEmail($email);
    // $account->validateUsername($username);
    // $account->validatePassword($password, $confirmpassword);
    $account->store(
        $name,
        $email,
        $username,
        $password,
        $confirmpassword
    );
}

// if (isset($_POST['submit'])) {
//     echo "HELLO";
// }

?>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Register User</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                        <p class="text-center small">Enter your personal details to create account</p>
                                    </div>

                                    <form action="<?php echo  $_SERVER['PHP_SELF'] ?>" class="row g-3 needs-validation" novalidate method="POST">
                                        <div class="col-12">
                                            <label for="name" class="form-label">Full Name</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="name" class="form-control" id="name" required>
                                                <div class="invalid-feedback">Please, enter your name!</div>
                                            </div>
                                            <span style="color: red; font-size:10px;">
                                                <?php
                                                echo $account->getError(Helper\Error::$nameValidationError);
                                                ?>
                                            </span>
                                        </div>
                                        <div class="col-12">
                                            <label for="username" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <input type="text" name="username" class="form-control" id="username" required>
                                                <div class="invalid-feedback">Please choose a username.</div>
                                            </div>
                                            <span style="color: red; font-size:10px;">
                                                <?php
                                                echo $account->getError(Helper\Error::$usernameValidationError);
                                                echo $account->getError(Helper\Error::$usernameValidationAlreadyTakenError);
                                                ?>
                                            </span>
                                        </div>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <div class="input-group has-validation">
                                                <input type="email" name="email" class="form-control" id="email" required>
                                                <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                            </div>
                                            <span style="color: red; font-size:10px;">
                                                <?php
                                                echo $account->getError(Helper\Error::$emailValidationError);
                                                echo $account->getError(Helper\Error::$emailValidationAlreadyTakenError);
                                                ?>
                                            </span>
                                        </div>
                                        <div class="col-12">
                                            <label for="password" class="form-label">Password</label>
                                            <div class="input-group has-validation">
                                                <input type="password" name="password" class="form-control" id="password" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <span style="color: red; font-size:10px;">
                                                <?php
                                                echo $account->getError(Helper\Error::$passwordValidationError);
                                                echo $account->getError(Helper\Error::$passwordValidationMismatchedError);
                                                ?>
                                            </span>
                                        </div>
                                        <div class="col-12">
                                            <label for="confirmpassword" class="form-label">Confirm Password</label>
                                            <div class="input-group has-validation">
                                                <input type="password" name="confirmpassword" class="form-control" id="confirmpassword" required>
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                            <span style="color: red; font-size:10px;">
                                                <?php
                                                echo $account->getError(Helper\Error::$passwordValidationError);
                                                echo $account->getError(Helper\Error::$passwordValidationMismatchedError);
                                                ?>
                                            </span>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" name="submit" id="submit">Create Account</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <div class="credits">
                                <!-- All the links in the footer should remain intact. -->
                                <!-- You can delete the links only if you purchased the pro version. -->
                                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php include 'includes\partials\footer-scripts.php' ?>

</body>

</html>