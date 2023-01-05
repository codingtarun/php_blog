<?php
include 'includes/Loader.php';

use Controller\Session as Session;
use Helper\Sanitizer as Sanitizer;
use Model\Role as Role;

if (!isset($_SESSION['username'])) {
    Session::logout();
    header('location:login.php');
}

if (isset($_POST['logout'])) {
    Session::logout();
}

$roleObj = new Role($con);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $role = $roleObj->edit($id);
} else {
    header("location:roles.php");
}

if (isset($_POST["update"])) {
    $title = Sanitizer::title($_POST["title"]);
    $description = Sanitizer::text($_POST["description"]);
    $status = $_POST["status"];
    $roleObj->update($id, $title, $description, $status);
    header("location:roles.php");
}
?>


<body>

    <?php
    include 'includes/partials/nav-header.php';
    ?>

    <?php
    include 'includes/partials/aside.php';
    ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Roles</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Roles</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">General Form Elements</h5>

                                <!-- General Form Elements -->
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                    <div class="row mb-3">
                                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $role->title; ?>">
                                            <?php
                                            echo $roleObj->getError(Helper\Error::$invalidTitleLength);
                                            echo $roleObj->getError(Helper\Error::$titleAlreadyExist);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" style="height: 100px" name="description" id="description"><?php echo $role->description; ?></textarea>
                                            <?php
                                            echo $roleObj->getError(Helper\Error::$textLengthTooLong);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="status" id="status">
                                                <option value="">Select</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-primary" name="update">Update</button>
                                        </div>
                                    </div>

                                </form><!-- End General Form Elements -->

                            </div>
                        </div>
                    </div>
                </div><!-- End Left side columns -->

                <?php
                include 'includes/partials/right-aside.php';
                ?>


            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <?php
    include 'includes/partials/footer-scripts.php';
    ?>

</body>

</html>